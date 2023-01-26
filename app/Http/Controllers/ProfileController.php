<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;
use Auth;
use Session;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        // $data = User::find($id);
        $data = DB::table('users')
        ->where('users.id',$id)
        ->first();
        return View::make('profile.profile', compact('data'));
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
        //
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
        $rules = [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'jabatan' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $data = User::findOrFail($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->username = $request->input('username');
        $data->jabatan = $request->input('jabatan');
        $data->bio = $request->input('bio');

        //upload image profile
        if ($request->file('image') != "") {
            $name_image = 'profile-'.$id.'-'.rand(0,100).'.jpg';
            $full_path_image = storage_path('data/profile'.'/'.$name_image);
            Image::make($request->file('image'))
                ->fit(128, 128)
                ->save($full_path_image, 80);

            if ($data->image != "") {
                $hapus_profile = storage_path('data/profile/'.$data->image);
                if (file_exists($hapus_profile)) {
                    unlink($hapus_profile);
                }
            }

            $data->image = $name_image;
        }

        //upload background profile
        if ($request->file('background') != "") {
            $name_backgroud = 'background-'.$id.'-'.rand(0,100).'.jpg';
            $full_path_background = storage_path('data/background'.'/'.$name_backgroud);
            Image::make($request->file('background'))
                ->fit(1440, 960)
                ->save($full_path_background, 80);

            if ($data->background != "") {
                $hapus_profile = storage_path('data/profile/'.$data->background);
                if (file_exists($hapus_profile)) {
                    unlink($hapus_profile);
                }
            }

            $data->background = $name_backgroud;
        }

        if ($data->save()) {
            return redirect('profile')->with('success','Berhasil Edit Profil');
        }else{
            return redirect('profile')->with('failed','Gagal Edit Profil');
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
}
