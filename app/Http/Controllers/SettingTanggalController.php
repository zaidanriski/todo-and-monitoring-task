<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SettingTanggal;
use Validator;
use Session;
use View;
use DB;

class SettingTanggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SettingTanggal::orderBy('bulan','asc')->pluck('bulan','bulan');
        $tanggal = SettingTanggal::all();
        $bulan = [];
        foreach ($tanggal as $key => $datas) {
            $bulan[$datas->bulan][] = $datas->tanggal;
        }

        return View::make('setting.tanggal.index',compact('data','bulan'));
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
            'bulan' => 'required',
            'tanggal' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $tanggal = $request->input('tanggal');
        $jumlah = count($tanggal);
        if ($jumlah == 0) {
            return redirect()->back()->with('failed','Gagal Tambah Setting Tanggal');
        }

        for ($i=0; $i < $jumlah; $i++) { 
            $data = new SettingTanggal();
            $data->tahun = 2020;
            $data->bulan = $request->input('bulan');
            $data->tanggal = $tanggal[$i];
            $data->save(); 
        }


        return redirect('setting-tanggal')->with('success','Berhasil Tambah Setting Tanggal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
