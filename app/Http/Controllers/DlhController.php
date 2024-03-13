<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ModelDlh;
use App\Models\User;
use App\Models\ModelPlant;
use App\Models\ModelTransaksi;

class DlhController extends Controller
{

    public function index($id)
    {
        $user = Auth::guard('dlh')->user();

        if (is_null($user)) {

            return redirect('/portal');
        }


        $userStatus = $user->status;

        $provinsi = $user->provinsi;
        $getVerifPlant = ModelPlant::whereHas('users', function ($query) use ($provinsi) {
            $query->where('provinsi', $provinsi);
        })
        ->where('status', 1)
        ->count();

        $getNotVerifPlant = ModelPlant::whereHas('users', function ($query) use ($provinsi) {
            $query->where('provinsi', $provinsi);
        })
        ->where('status', 0)
        ->count();

        $getUnverifiedUsers = User::where('provinsi', $provinsi)
        ->where('status', "Belum Terverifikasi")
        ->count();

        $totalCarbon = ModelPlant::whereHas('users', function ($query) use ($provinsi) {
            $query->where('provinsi', $provinsi);
        })
        ->sum('totalCarbon');

        $transactionCarbon = ModelPlant::whereHas('users', function ($query) use ($provinsi) {
                $query->where('provinsi', $provinsi);
            })
            ->sum('transactionCarbon');

        $totalKarbon = $totalCarbon + $transactionCarbon;

        $countUser = User::where('status', "Terverifikasi")->where('provinsi', $provinsi)->count();

        $topCompanies = User::select('users.perusahaan', 'users.provinsi', \DB::raw('SUM(CASE WHEN plant.totalCarbon > 0 THEN plant.totalCarbon ELSE plant.transactionCarbon END) as totalCarbon'))
                        ->join('plant', 'users.id', '=', 'plant.idUser')
                        ->groupBy('users.perusahaan', 'users.provinsi')
                        ->orderByDesc('totalCarbon')
                        ->limit(10)
                        ->get();

        if ($userStatus === "Belum Terverifikasi") {
            return view('DLH.notVerif');
        } else {
            return view('DLH.index', compact('getVerifPlant','getNotVerifPlant','getUnverifiedUsers','totalKarbon','countUser','topCompanies'));
        }

    }

    public function hitungCarbon()
    {

        return view('DLH.calCarbon');
    }

    public function Register(Request $request)
    {
        $regis = new ModelDlh;
        $regis->username = $request->input('username');
        $regis->password = $request->input('password');
        $regis->email = $request->input('email');
        $regis->provinsi = $request->input('provinsi');
        $regis->save();
        return redirect('/portal')->with('Accepted', 'Berhasil Registarasi Akun, Silahkan Login.');
    }

    public function manageUser()
    {
        $getAuth = Auth::guard('dlh')->user();
        $provinsi = $getAuth->provinsi;

        $getAllUser = DB::table('users')->where('provinsi', $provinsi)->get();

        $sumOfUser = DB::table('users')->count();
        $verif = DB::table('users')->where('status', "Terverifikasi")->count();
        $notVerif = DB::table('users')->where('status', "Belum Terverifikasi")->count();

        return view('DLH.manageUser', compact('getAllUser','sumOfUser','verif','notVerif'));
    }

    public function verifUser($id)
    {
        $getUser = User::where('id', $id)->first();
        $getUser->status = "Terverifikasi";
        $getUser->update();
        return redirect('/manageUser')->with('berhasil', 'Akun User berhasil diverifikasi');
    }

    public function DetailUser()
    {
        $getUser = DB::table('users')->where('status', "Terverifikasi")->get();
        return view('DLH.detailUser', compact('getUser'));
    }

    public function showPlant(){
        $dlhUser = Auth::guard('dlh')->user();
        $provinsi = $dlhUser->provinsi;
        $users = User::where('provinsi', $provinsi)->get();

        // Mengambil data tanaman berdasarkan id pengguna yang memiliki provinsi yang sama
        $getPlant = ModelPlant::whereIn('idUser', $users->pluck('id'))->where('status', 0)->get();

        $s = $getPlant->count();
        $u = $users->count();
        $notVerif = 0;
        $n = ModelPlant::whereIn('idUser', $users->pluck('id'))->where('status', $notVerif)->count();

        return view('DLH.plantUser', compact('getPlant','s','u','n'));
    }

    public function detailPlant($id)
    {
        $dlhUser = Auth::guard('dlh')->user();
        $provinsi = $dlhUser->provinsi;
        $users = User::where('provinsi', $provinsi)->get();
        $getDetailPlant = ModelPlant::whereIn('idUser', $users->pluck('id'))->where('idPlant', $id)->first();

        return view('DLH.detailPlant', compact('getDetailPlant'));
    }

    public function hitungCarbonTanaman(Request $request)
    {
        $getIdPlant = $request->input('field_id');
        $update = ModelPlant::where('idPlant', $getIdPlant)->first();
        $update->totalCarbon = $request->input('hasilPerhitungan');
        $update->status = 1;
        $update->save();

        $getUser = $request->input('field_idUser');
        $totalCarbon = ModelPlant::where('idUser', $getUser)->sum('totalCarbon');

        // $updateTransaksi = ModelTransaksi::where('idUser', $getUser)->first();
        // $updateTransaksi->status = 0;
        // $updateTransaksi->sumOfCarbon = $totalCarbon;
        // $updateTransaksi->save();

        return redirect('/historyVerifPlant')->with('berhasil', 'Tanaman Berhasil diVerifikasi');
    }

    public function historyVerifPlant()
    {
        $dlhUser = Auth::guard('dlh')->user();
        $provinsi = $dlhUser->provinsi;
        $users = User::where('provinsi', $provinsi)->get();
        $getPlant = ModelPlant::whereIn('idUser', $users->pluck('id'))->where('status', 1)->get();
        $getPlantUser = ModelPlant::whereIn('idUser', $users->pluck('id'))->where('status', 1)->count();

        $s = $getPlant->count();
        $u = $users->count();
        $notVerif = 0;
        $n = ModelPlant::whereIn('idUser', $users->pluck('id'))->where('status', $notVerif)->count();

        return view('DLH.historyVerifPlant', compact('getPlant','s','u','n','getPlantUser'));
    }
}
