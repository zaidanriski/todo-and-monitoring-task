<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PesanKirim;
use App\PesanMasuk;
use App\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use View;
use DB;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $list_user = User::whereNotIn('id',[$id_user,0])->pluck('name','id');
        $get_pesan_masuk = PesanMasuk::all();
        $array_id_pm = [];
        foreach ($get_pesan_masuk as $data) {
            if(Hash::check($id_user,$data->penerima)) {
                $array_id_pm[] = $data->id;
            }
        }

        $pesan_masuk = DB::table('pesan_masuks')
        ->join('users','pesan_masuks.pengirim','=','users.id','left')
        ->select('pesan_masuks.*','users.name as nama_pengirim')
        ->whereIn('pesan_masuks.id',$array_id_pm)
        ->paginate(10);
        

        return View::make('pesan', compact('list_user','pesan_masuk'));
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
            'to' => 'required',
            'subject' => 'required',
            'isi' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        if ($request->has('anonim')) {
            $anonim = 2;
        }else{
            $anonim = 1;
        }

        //simpan data kirim
        $id_user = Auth::user()->id;
        $kirim = new PesanKirim();
        $kirim->pengirim = Hash::make($id_user);
        $kirim->penerima = $request->input('to');
        $kirim->anonim = $anonim;
        $kirim->subject = Crypt::encryptString($request->input('subject'));
        $kirim->isi = Crypt::encryptString($request->input('isi'));
        $kirim->tanggal = Carbon::now();
        if ($kirim->save()) {
            
            //simpan data pesan masuk
            $masuk = new PesanMasuk();
            $masuk->pesan_kirim_id = Hash::make($kirim->id);
            $masuk->penerima = Hash::make($request->input('to'));
            if ($request->has('anonim')) {
                $masuk->pengirim = $id_user;
            }else{
                $masuk->pengirim = 0;
            }
            $masuk->anonim = $anonim;
            $masuk->subject = Crypt::encryptString($request->input('subject'));
            $masuk->isi = Crypt::encryptString($request->input('isi'));
            $masuk->status = 'baru';
            $masuk->tanggal = $kirim->tanggal;
            if ($masuk->save()) {
                $update_kirim = PesanKirim::where('id',$kirim->id)->update(['status' => 'berhasil_kirim']);
            }else{
                $update_kirim = PesanKirim::where('id',$kirim->id)->update(['status' => 'gagal_kirim']);
            }

            //kembali ke halam awal
            return redirect('dashboard')->with('success','Berhasil Kirim Pesan');
        }else{
            return redirect('dashboard')->with('failed','Gagal Kirim Pesan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->input('id');

        $data = PesanMasuk::findOrFail($id);

        $subject = Crypt::decryptString($data->subject);
        $isi = Crypt::decryptString($data->isi);
        $pengirim = $data->pengirim;
        $anonim = $data->anonim;

        // tampil tanggal post
        $dt = Carbon::now();
        $tanggal = $dt->diffForHumans($data->tanggal);

        //cek anonim
        if ($anonim == 1) {
            $user = User::find($pengirim);
        }else{
            $user = User::find(0);
        }

        $nama_pengirim = $user->name;
        $email = $user->email;
        $image = $user->image;
        $background = $user->background;

        return response()->json(['msg' => 'berhasil','id' => $id,'subject' => $subject,'isi' => $isi,'tanggal' => $tanggal,'pengirim' => $pengirim,'anonim' => $anonim,'nama_pengirim' => $nama_pengirim,'email' => $email,'image' => $image,'background' => $background]);
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
    public function update(Request $request, $id)
    {
        //
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
}
