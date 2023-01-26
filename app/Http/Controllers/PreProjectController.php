<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\PreProject;
use View;
use Validator;
use Session;

class PreProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::whereNotIn('id',[100])->get();

        return View::make('preproject.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tanggal' => 'required',
            'title' => 'required',
            'catatan' => 'required',
            'id_project' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $data = new PreProject();
        $data->id_project = $request->input('id_project');
        $data->tanggal = tgl_format_db($request->input('tanggal'));
        $data->title = $request->input('title');
        $data->content = $request->input('catatan');
        if ($data->save()) {
            return redirect('pre-project-detail/'.$data->id_project)->with('success','Berhasil Tambah Catatan');
        }else{
            return redirect('pre-project-detail/'.$data->id_project)->with('success','Gagal Tambah Catatan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $data = PreProject::where('id_project',$id)->get();

        return View::make('preproject.show',compact('project','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'tanggal' => 'required',
            'title' => 'required',
            'catatan' => 'required',
            'id_catatan' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $id = $request->input('id_catatan');

        $data = PreProject::findOrFail($id);
        $data->tanggal = tgl_format_db($request->input('tanggal'));
        $data->title = $request->input('title');
        $data->content = $request->input('catatan');
        if ($data->save()) {
            return redirect('pre-project-detail/'.$data->id_project)->with('success','Berhasil Update Catatan');
        }else{
            return redirect('pre-project-detail/'.$data->id_project)->with('success','Gagal Update Catatan');
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

    public function showJson(Request $request)
    {
        $id = $request->input('id');
        $data = PreProject::findOrFail($id);

        return response()->json(['tanggal' => tgl_format($data->tanggal), 'title' => $data->title, 'content' => $data->content]);
    }

    public function destroyJson(Request $request)
    {
        $id = $request->input('id');
        $data = PreProject::findOrFail($id);
        if ($data->delete()) {
            return response()->json(['msg' => 'berhasil']);
        }else{
            return response()->json(['msg' => 'gagal']);
        }
    }
}
