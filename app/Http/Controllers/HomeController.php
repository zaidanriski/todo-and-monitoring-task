<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\PesanKirim;
use App\PesanMasuk;
use Auth;
use View;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $id_user = Auth::user()->id;
        // $list_user = User::whereNotIn('id',[$id_user,0])->pluck('name','id');
        // $get_pesan_masuk = PesanMasuk::all();
        // $array_id_pm = [];
        // foreach ($get_pesan_masuk as $data) {
        //     if(Hash::check($id_user,$data->penerima)) {
        //         $array_id_pm[] = $data->id;
        //     }
        // }

        // $pesan_masuk = DB::table('pesan_masuks')
        // ->join('users','pesan_masuks.pengirim','=','users.id','left')
        // ->select('pesan_masuks.*','users.name as nama_pengirim')
        // ->whereIn('pesan_masuks.id',$array_id_pm)
        // ->paginate(10);
        

        // return View::make('dashboard', compact('list_user','pesan_masuk'));
        $role = Auth::user()->role;
        if ($role == 1) {
            return redirect('detail-task');
        }else{
            return redirect('daily-task');
        }
    }


}
