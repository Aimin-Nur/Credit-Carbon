<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ModelKlh;
use App\Models\ModelDlh;
use App\Models\User;
use App\Models\ModelArtikel;


class KlhController extends Controller
{
    public function index()
    {
        $getCount = DB::table('DLH')->count();
        $topProvinces = User::select('users.provinsi', \DB::raw('SUM(CASE WHEN plant.totalCarbon > 0 THEN plant.totalCarbon ELSE plant.transactionCarbon END) as totalCarbon'))
                        ->join('plant', 'users.id', '=', 'plant.idUser')
                        ->groupBy('users.provinsi')
                        ->orderByDesc('totalCarbon')
                        ->limit(10)
                        ->get();

        $getArtikel = ModelArtikel::where('status', "Publish")->get();

        return view('KLH.index', compact('getCount','topProvinces','getArtikel'));
    }

    public function regisKlh()
    {
        return view('regisKlh');
    }

    public function Register(Request $request)
    {
        $regis = new ModelKlh;
        $regis->name = $request->input('instansi');
        $regis->username = "Admin KLH";
        $regis->password = $request->input('password');
        $regis->email = $request->input('email');
        $regis->save();
        return redirect('/portal')->with('Accepted', 'Berhasil Registarasi Akun, Silahkan Login.');
    }

    public function manageDlh()
    {
        $get = DB::table('DLH')->get();
        $sumOfDlh = DB::table('DLH')->count();
        $verif = DB::table('DLH')->where('status', "Terverifikasi")->count();
        $notVerif = DB::table('DLH')->where('status', "Belum Terverifikasi")->count();
        return view('KLH.manageDlh', compact('get','sumOfDlh','verif','notVerif'));
    }

    public function verifDlh($id)
    {
        $getDlh = ModelDlh::where('id', $id)->first();
        $getDlh->status = "Terverifikasi";
        $getDlh->update();
        return redirect('/managedlh')->with('berhasil', 'Akun DLH berhasil diverifikasi');
    }

    public function readArtikel($id)
    {
        $getId = ModelArtikel::where('id', $id)->first();
        return view('KLH.viewArtikel', compact('getId'));
    }

    public function showCarbonUser()
    {
        $userCarbon = User::select('users.perusahaan as nama_perusahaan','users.provinsi as provinsi', 'users.foto as foto')
                    ->join('plant', 'users.id', '=', 'plant.IdUser')
                    ->where('plant.status', 1)
                    ->selectRaw('COUNT(plant.idPlant) as jumlah_tanaman')
                    ->selectRaw('SUM(CASE WHEN plant.totalCarbon > 0 THEN plant.totalCarbon ELSE plant.transactionCarbon END) as total_carbon')
                    ->groupBy('users.perusahaan', 'users.provinsi', 'users.foto')
                    ->orderBy('total_carbon', 'DESC')
                    ->get();

        return view('KLH.showCarbonUser', compact('userCarbon'));
    }

}
