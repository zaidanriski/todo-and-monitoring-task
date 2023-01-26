<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\User;
use App\Task;
use App\Divisi;
use App\Project;
use App\Note;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //periode tanggal tampil task
        if ($request->has('bulan-periode') && $request->has('tahun-periode')) {
            $bulan_periode = $request->get('bulan-periode');
            $tahun_periode = $request->get('tahun-periode');
        }else{
            if (date('d') >= 26) {
                $bulan_periode = date('m') + 1;
                $tahun_periode = date('Y');
            }else{
                $bulan_periode = date('m');
                $tahun_periode = date('Y');
            }
        }
        $bulan_sekarang = Carbon::createFromDate($tahun_periode, $bulan_periode, 26, 0);
        $bulan_sebelumnya = Carbon::createFromDate($tahun_periode, $bulan_periode, 26, 0)->subMonth();
        $tanggal_periode = CarbonPeriod::create($bulan_sebelumnya, $bulan_sekarang);

        $id_user = Auth::user()->id;
        $data = User::findOrFail($id_user);
        $tanggal = Carbon::today()->toDateString();

        $data_user = User::where('role',1)->whereNotIn('id',[0])->get();

        $chart_user = [];
        foreach($data_user as $key => $datas){
            //hittung task due today
            $task_due_today = Task::where('id_user',$datas->id)
            ->where('tanggal',$tanggal)
            ->whereNotIn('project_id',[100])
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_due_today'] = $task_due_today;

            //hitung chect task today
            $task_check_today = Task::where('id_user',$datas->id)
            ->whereIn('status_check',[1,2,3])
            ->where('tanggal',$tanggal)
            ->whereNotIn('project_id',[100])
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_check_today'] = $task_check_today;

            //hitung task delay due
            $task_due_delay = Task::where('id_user',$datas->id)
            ->where('delay',1)
            ->where('tanggal','<=',Carbon::today())
            ->whereNotIn('project_id',[100])
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_due_delay'] = $task_due_delay;

            //hitung check delay
            $task_check_delay = Task::where('id_user',$datas->id)
            ->whereIn('status_check',[3])
            ->where('tanggal','<=',Carbon::today())
            ->whereNotIn('project_id',[100])
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_check_delay'] = $task_check_delay;

            //hitung task due finish
            $task_due_finish = Task::where('id_user',$datas->id)
            ->where('status',[3])
            ->whereNotIn('project_id',[100])
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_due_finish'] = $task_due_finish;

            //hitung task finish check
            $task_check_finish = Task::where('id_user',$datas->id)
            ->whereIn('status_check',[2])
            ->whereNotIn('project_id',[100])
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_check_finish'] = $task_check_finish;

            //hitung task probelm
            $task_problem = Task::where('id_user',$datas->id)
            ->where('problem','!=','')
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_problem'] = $task_problem;

            //hitung reminder open
            $task_reminder_open = Note::where('id_user',$datas->id)
            ->where('status',0)
            ->where('due_date','>',Carbon::now())
            ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
            ->count();
            $chart_user[$datas->id]['task_reminder_open'] = $task_reminder_open;
        }

        return View::make('task.index',compact('id_user','data','tanggal','data_user','chart_user','bulan_periode','tahun_periode','bulan_sekarang','bulan_sebelumnya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_user = null)
    {
        if (is_null($id_user)) {
            $nama = "";
        }else{
            $data = User::findOrFail($id_user);
            $nama = $data->name;
        }
        $project = Project::whereNotIn('id',[100])->pluck('nama','id');
        return View::make('task.create', compact('project','nama','id_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id_user_get = null)
    {
        $get_tanggal = $request->input('tanggal');
        if ($get_tanggal == "") {
            $tanggal = Carbon::today();
        }else{
            $tanggal = tgl_format_db($get_tanggal);
        }
        $task = $request->input('task');
        $jam_mulai = $request->input('jam_mulai');
        $jam_selesai = $request->input('jam_selesai');
        $project = $request->input('project');
        if (is_null($id_user_get)) {
            $id_user = Auth::user()->id;
        }else{
            $id_user = $id_user_get;
        }

        if (is_array($task)) {
            $jum = count($task);
        }else{
            $jum = 0;
        }
        if($jum == 0){
            return redirect()->back()->with('failed','Task Tidak Boleh Kosong!');
        }
        for ($i=0; $i < $jum; $i++) { 
            $data = new Task();
            $data->tanggal = $tanggal;
            $data->id_user = $id_user;
            $data->task = $task[$i];
            $data->jam_mulai = $jam_mulai[$i];
            $data->jam_selesai = $jam_selesai[$i];
            $data->project_id = $project[$i];
            $data->status = '0';
            $data->save();
        }

        return redirect('detail-task/'.$id_user_get)->with('success','berhasil tambah task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id_user_get = null)
    {
        $tab = 'today';
        $tab_get = $request->get('tab');
        if($request->has('tab')) {
            $tab = $tab_get;
        }
        //periode tanggal tampil task
        if ($request->has('bulan-periode') && $request->has('tahun-periode')) {
            $bulan_periode = $request->get('bulan-periode');
            $tahun_periode = $request->get('tahun-periode');
        }else{
            if (date('d') >= 26) {
                $bulan_periode = date('m') + 1;
                $tahun_periode = date('Y');
            }else{
                $bulan_periode = date('m');
                $tahun_periode = date('Y');
            }
        }
        $bulan_sekarang = Carbon::createFromDate($tahun_periode, $bulan_periode, 26, 0);
        $bulan_sebelumnya = Carbon::createFromDate($tahun_periode, $bulan_periode, 26, 0)->subMonth();
        $tanggal_periode = CarbonPeriod::create($bulan_sebelumnya, $bulan_sekarang);

        if (is_null($id_user_get)) {
            $id_user = Auth::user()->id;
        }else{
            $id_user = $id_user_get;
        }
        $data = User::findOrFail($id_user);
        $tanggal = Carbon::today()->toDateString();
        $data_user = 
        //ubah status delay jika task sudah melewati hari / delay maka akan generate task baru
        $delay = Task::where('id_user',$id_user)
        ->whereIn('status',[4,1,0])
        ->where('status_check',0)
        ->where('delay',0)
        ->where('tanggal','<=',Carbon::yesterday())
        ->get();
        foreach($delay as $datas){
            $data_new = new Task();
            $data_new->tanggal = $tanggal;
            $data_new->id_user = $datas->id_user;
            $data_new->task = $datas->task;
            $data_new->jam_mulai = '08:15';
            $data_new->jam_selesai = '08:15';
            $data_new->project_id = $datas->project_id;
            $data_new->status = '0';
            if ($data_new->save()) {
                //update to delay task
                $update_delay = Task::find($datas->id);
                $update_delay->status = 4;
                $update_delay->delay = 1;
                $update_delay->save();
            }
        }

        $task = Task::where('id_user',$id_user);
        //hittung task due today
        $task_due_today = Task::where('id_user',$id_user)
        ->where('tanggal',$tanggal)
        ->whereNotIn('project_id',[100])
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung chect task today
        $task_check_today = Task::where('id_user',$id_user)
        ->whereIn('status_check',[1,2,3])
        ->where('tanggal',$tanggal)
        ->whereNotIn('project_id',[100])
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung task delay due
        $task_due_delay = Task::where('id_user',$id_user)
        ->where('delay',1)
        ->where('tanggal','<=',Carbon::today())
        ->whereNotIn('project_id',[100])
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung check delay
        $task_check_delay = Task::where('id_user',$id_user)
        ->whereIn('status_check',[3])
        ->where('tanggal','<=',Carbon::today())
        ->whereNotIn('project_id',[100])
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung task due finish
        $task_due_finish = Task::where('id_user',$id_user)
        ->where('status',[3])
        ->whereNotIn('project_id',[100])
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung task finish check
        $task_check_finish = Task::where('id_user',$id_user)
        ->whereIn('status_check',[2])
        ->whereNotIn('project_id',[100])
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung task probelm
        $task_problem = Task::where('id_user',$id_user)
        ->where('problem','!=','')
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung task probelm done
        $task_problem_done = Task::where('id_user',$id_user)
        ->where('problem','!=','')
        ->where('status_problem',1)
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //hitung reminder open
        $task_reminder_open = Note::where('id_user',$id_user)
        ->where('status',0)
        ->where('due_date','>',Carbon::now())
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->count();

        //tampil task daily
        $task_daily = DB::table('tasks')
        ->join('projects','tasks.project_id','=','projects.id','left')
        ->select('tasks.*','projects.nama as project_name')
        ->where('tasks.id_user',$id_user)
        ->where('tasks.tanggal',$tanggal)
        ->whereNotIn('project_id',[100])
        ->get();

        $counter_measer = Task::where('id_user',$id_user)
        ->where('problem',1)
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->get();

        //all task daily
        $task_daily_all = Task::where('id_user',$id_user)
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])->whereNotIn('project_id',[100])
        ->where(function($query) use ($tab){
            if ($tab == 'delay') {
                $query->where('delay',1);
            }

            if ($tab == 'finish') {
                $query->where('status',3);
            }
        })
        ->orderBy('tanggal','desc')
        ->get();
        //tampil reminder
        $reminder = DB::table('notes')->where('id_user',$id_user)
        ->whereBetween('tanggal',[$bulan_sebelumnya->toDateString(),$bulan_sekarang->toDateString()])
        ->get();
        // dd($reminder);
        // dd($bulan_sebelumnya);
        $task_day = [];
        foreach ($task_daily_all as $key => $datas) {
            $task_day[$datas->tanggal][$datas->id]['status'] = $datas->status;
        }
        // dd($bulan_sekarang);

        return View::make('task.show',compact('id_user','data','tanggal','task_due_today','task_check_today','task_due_delay','task_check_delay','task_due_finish','task_check_finish','task_problem','task_daily','counter_measer','tanggal_periode','task_daily_all','bulan_periode','tahun_periode','bulan_sekarang','reminder','bulan_sebelumnya','task_problem_done','task_reminder_open','tab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user,$tanggal)
    {
        $get_id_auth = Auth::user()->id;
        if ($get_id_auth != $id_user) {
            return redirect()->back()->with('failed','anda tidak dapat akses untuk edit task ini');
        }

        $project = Project::whereNotIn('id',[100])->pluck('nama','id');

        $data = DB::table('tasks')
        ->join('projects','tasks.project_id','=','projects.id','left')
        ->select('tasks.*','projects.nama as project_name')
        ->where('tasks.id_user',$id_user)
        ->where('tasks.tanggal',$tanggal)
        ->whereNotIn('tasks.project_id',[100])
        ->get();

        return View::make('task.edit',compact('data','tanggal','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user, $tanggal)
    {
        $get_id_auth = Auth::user()->id;
        if ($get_id_auth != $id_user) {
            return redirect()->back()->with('failed','anda tidak dapat akses untuk edit task ini');
        }

        $id_task = $request->input('id_task');
        $task = $request->input('task');
        $jam_mulai = $request->input('jam_mulai');
        $jam_selesai = $request->input('jam_selesai');
        $project = $request->input('project');
        $id_user = Auth::user()->id;

        if (is_array($task)) {
            $jum = count($task);
        }else{
            $jum = 0;
        }
        if($jum == 0){
            return redirect()->back()->with('failed','Task Tidak Boleh Kosong!');
        }
        for ($i=0; $i < $jum; $i++) { 
            if ($id_task[$i] == 0) {
                $data = new Task();
                $data->tanggal = $tanggal;
                $data->id_user = $id_user;
                $data->status = '1';
            }else{
                $data = Task::find($id_task[$i]);
            }
            $data->task = $task[$i];
            $data->jam_mulai = $jam_mulai[$i];
            $data->jam_selesai = $jam_selesai[$i];
            $data->project_id = $project[$i];
            $data->save();
        }

        //delete task
        $delete = Task::whereNotIn('id',$id_task)->where('tanggal',$tanggal)->delete();

        return redirect('detail-task')->with('success','berhasil Edit task');
    }

    public function updateStatus(Request $request)
    {
        $id_task = $request->input('id_task');
        $id_user = $request->input('id_user');
        $status = $request->input('status');

        if ($id_task != "" && $id_user != "" && $status != "") {
            $data = Task::findOrFail($id_task);
            $data->status = $status;
            if ($request->has('problem')) {
                $data->problem = 1;
                $data->counter = $request->input('counter');
                $data->measer = $request->input('measer');
            }else{
                $data->problem = NULL;
                $data->counter = NULL;
                $data->measer = NULL;
            }
            if ($data->save()) {
                return redirect()->back()->with('success','berhasil ubah status');
            }else{
                return redirect()->back()->with('failed','gagal ubah status');
            }
        }else{
            return redirect()->back()->with('failed','gagal ubah status 2');
        }
    }

    public function updateStatusFinish(Request $request)
    {
        $id_task = $request->input('id_task');
        $id_user = $request->input('id_user');

        if ($id_task != "" && $id_user != "") {
            $data = Task::findOrFail($id_task);
            $data->status = 2;
            if ($request->has('problem')) {
                $data->problem = 1;
                $data->counter = $request->input('counter');
                $data->measer = $request->input('measer');
            }else{
                $data->problem = NULL;
                $data->counter = NULL;
                $data->measer = NULL;
            }
            if ($data->save()) {
                return redirect()->back()->with('success','berhasil ubah status');
            }else{
                return redirect()->back()->with('failed','gagal ubah status');
            }
        }else{
            return redirect()->back()->with('failed','gagal ubah status');
        }
    }

    public function updateCounterMeaser(Request $request)
    {
        $id_task = $request->input('id_task');
        $id_user = $request->input('id_user');
        $counter = $request->input('counter');
        $measer = $request->input('measer');
        if (Auth::user()->role == 1) {
            $link = 'detail-task?tab=problem';
        }else{
            $link = 'detail-task/'.$id_user.'?tab=problem';
        }

        if ($id_task != "" && $counter != "" && $measer != "") {
            $data = Task::findOrFail($id_task);
            $data->problem = 1;
            $data->counter = $request->input('counter');
            $data->measer = $request->input('measer');
            if ($data->save()) {
                return redirect($link)->with('success','berhasil ubah Counter Measure');
            }else{
                return redirect($link)->with('failed','gagal ubah Counter Measure');
            }
        }else{
            return redirect($link)->with('failed','gagal ubah Counter Measure');
        }
    }

    public function addCounterMeaser(Request $request)
    {
        $id_user = $request->input('id_user');
        $tanggal = $request->input('tanggal-cm');
        $counter = $request->input('counter');
        $measer = $request->input('measer');
        if (Auth::user()->role == 1) {
            $link = 'detail-task?page=2';
        }else{
            $link = 'detail-task/'.$id_user.'?page=2';
        }

        if ($id_user != "" && $counter != "" && $measer != "" && $tanggal != "") {
            $data = new Task();
            $data->tanggal = tgl_format_db($tanggal);
            $data->id_user = $id_user;
            $data->task = 'Other Task';
            $data->jam_mulai = '00:00';
            $data->jam_selesai = '00:00';
            $data->project_id = 100;
            $data->status = '0';
            $data->problem = 1;
            $data->counter = $counter;
            $data->measer = $measer;
            $data->save();
            if ($data->save()) {
                return redirect($link)->with('success','berhasil tambah counter measure');
            }else{
                return redirect($link)->with('failed','gagal tambah counter measure');
            }
        }else{
            return redirect($link)->with('failed','gagal tambah counter measure');
        }
    }

    public function addReminder(Request $request)
    {
        $id_user = $request->input('id_user');
        $target = $request->input('target');
        $note = $request->input('note');
        if (Auth::user()->role == 1) {
            $link = 'detail-task?tab=reminder';
        }else{
            $link = 'detail-task/'.$id_user.'?tab=reminder';
        }

        if ($id_user != "" && $target != "" && $note != "") {
            $data = new Note();
            $data->tanggal = Carbon::today();
            $data->id_user = $id_user;
            $data->note = $note;
            $data->due_date = $target;
            $data->save();
            if ($data->save()) {
                return redirect($link)->with('success','berhasil tambah Reminder');
            }else{
                return redirect($link)->with('failed','gagal tambah Reminder');
            }
        }else{
            return redirect($link)->with('failed','gagal tambah Reminder');
        }
    }

    public function updateReminder(Request $request)
    {
        $id_user = $request->input('id_user');
        $id_reminder = $request->input('id_reminder');
        $target = $request->input('target');
        $note = $request->input('note');
        if (Auth::user()->role == 1) {
            $link = 'detail-task?tab=reminder';
        }else{
            $link = 'detail-task/'.$id_user.'?tab=reminder';
        }

        if ($id_user != "" && $target != "" && $note != "") {
            $data = Note::find($id_reminder);
            $data->note = $note;
            $data->due_date = $target;
            $data->save();
            if ($data->save()) {
                return redirect($link)->with('success','berhasil update Reminder');
            }else{
                return redirect($link)->with('failed','gagal update Reminder');
            }
        }else{
            return redirect($link)->with('failed','gagal update Reminder');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function statusJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);

        $status = array(
            '0' => 'On Proses',
            '1' => 'On Proses',
            '2' => 'Waiting Check',
            '3' => 'Finish',
            '4' => 'Delay',
        );

        $status_name = $status[$data->status];
        
        return response()->json(['msg' => 'berhasil','status' => $data->status, 'id_user' => $data->id_user, 'status_name' => $status_name, 'problem' => $data->problem, 'counter' => $data->counter, 'measer' => $data->measer]);
    }

    public function reminderJson(Request $request)
    {
        $id = $request->input('id');

        $data = Note::findOrFail($id);

        $status = array(
            '0' => 'Open',
            '1' => 'Done',
            '2' => 'Overdue'
        );

        $status_name = $status[$data->status];
        
        return response()->json(['msg' => 'berhasil','status' => $data->status, 'id_user' => $data->id_user, 'status_name' => $status_name, 'note' => $data->note, 'due_date' => $data->due_date]);
    }

    public function statusProsesJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        $data->status = 1;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function statusMonitorJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        $data->status_check = 1;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function statusCheckedOntimeJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        $data->status_check = 2;
        $data->status = 3;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function statusCheckedDelayJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        $data->status_check = 3;
        $data->status = 4;
        $data->delay = 1;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function statusOpenJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        $data->status = 0;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function problemDoneJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        $data->status_problem = 1;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }
    

    public function destroyTaskJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        if($data->delete()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function destroyProblemJson(Request $request)
    {
        $id = $request->input('id');

        $data = Task::findOrFail($id);
        $data->counter = null;
        $data->measer = null;
        $data->problem = null;
        $data->status_problem = 0;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function destroyReminderJson(Request $request)
    {
        $id = $request->input('id');

        $data = Note::findOrFail($id);
        if($data->delete()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function statusDoneReminderJson(Request $request)
    {
        $id = $request->input('id');

        $data = Note::findOrFail($id);
        $data->status = 1;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function statusOpenReminderJson(Request $request)
    {
        $id = $request->input('id');

        $data = Note::findOrFail($id);
        $data->status = 0;
        if($data->save()){
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }

    }

    public function updateCounterMeaserJson(Request $request)
    {
        $id_task = $request->input('id_task');
        $id_user = $request->input('id_user');
        $counter = $request->input('counter');
        $measer = $request->input('measer');

        if ($id_task != "" && $counter != "" && $measer != "") {
            $data = Task::findOrFail($id_task);
            $data->counter = $request->input('counter');
            $data->measer = $request->input('measer');
            if ($data->save()) {
                return repsonse()->json(['msg' => 'berhasil']);
            }else{
                return repsonse()->json(['msg' => 'gagal']);
            }
        }else{
            return repsonse()->json(['msg' => 'gagal']);
        }
    }
}
