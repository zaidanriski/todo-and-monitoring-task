<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Validator;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::whereNotIn('id',[100])->get();

        return view('setting.project.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.project.create');
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
            'nama-project' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $data = new Project();
        $data->nama = $request->input('nama-project');
        $data->description = $request->input('description');
        if ($data->save()) {
            return redirect('master-project')->with('success','Berhasil Tambah Project');
        }else{
            return redirect('master-project')->with('failed','Gagal Tambah Project');
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
    public function update(Request $request)
    {
        $rules = [
            'id_project' => 'required',
            'nama-project' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
        $id = $request->input('id_project');
        $data = Project::findOrFail($id);
        $data->nama = $request->input('nama-project');
        $data->description = $request->input('description');
        if ($data->save()) {
            return redirect('master-project')->with('success','Berhasil Edit Project');
        }else{
            return redirect('master-project')->with('failed','Gagal Edit Project');
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

    public function getDataJson(Request $request)
    {
        $id = $request->input('id');
        if ($id == "") {
            return response()->json(['msg' => 'gagal']);
        }

        $data = Project::findOrFail($id);
        return response()->json(['msg' => 'berhasil','nama' => $data->nama, 'description' => $data->description]);
    }

    public function destroyJson(Request $request)
    {
        $id = $request->input('id');
        if ($id == "") {
            return response()->json(['msg' => 'gagal']);
        }

        $data = Project::findOrFail($id);
        if ($data->delete()) {
            return response()->json(['msg' => 'berhasil','nama' => $data->nama, 'description' => $data->description]);
        }else{
            return response()->json(['msg' => 'gagal']);
        }
    }
}
