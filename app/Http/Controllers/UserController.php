<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ModelDlh;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\View;
use App\Models\ModelPlant;
use App\Models\ModelTransaksi;
use App\Models\ModelArtikel;

class UserController extends Controller
{

    public function index($id)
    {
        $idUser = Auth::guard('swasta')->id();
        $plants = ModelPlant::where('idUser', $id)
            ->where('status', 1)
            ->get();

        // Mengelompokkan data berdasarkan jenis tanaman dan menjumlahkan totalCarbon untuk setiap jenis tanaman
        $carbonData = $plants->groupBy('jenis')->map(function ($group) {
            return $group->sum('totalCarbon');
        });

        // Memformat data untuk digunakan dalam chart
        $categories = $carbonData->keys()->toJson();
        $seriesData = $carbonData->values()->toJson();

        $formattedSumOfCarbonjs = number_format($carbonData->sum(), 2);

        $user = Auth::guard('swasta')->user();

        if (is_null($user)) {
            return redirect('/portal');
        }

        $totalCarbonPoint = DB::table('plant')->where('idUser', $idUser)->sum('totalCarbon');
        $formattedSumOfCarbon = number_format($totalCarbonPoint, 2);


        $userStatus = $user->status;

        $sumOfTransaksi = DB::table('transaksi')->where('idUser', $idUser)->where('status',1)->count();
        $sumOfPlant = DB::table('plant')->where('idUser', $idUser)->where('status', 0)->count();
        $sumOfPlantVerif = DB::table('plant')->where('idUser', $idUser)->where('status', 1)->count();
        $topFive = DB::table('plant')->where('idUser', $idUser)->where('status', 1)->orderByDesc('totalCarbon')->limit(5)->get();

        $getArtikel = ModelArtikel::where('status', "Publish")->get();


        if ($userStatus === "Belum Terverifikasi") {
            return view('user.notVerif');
        } else {
            return view('user.index', compact('getArtikel','categories', 'seriesData', 'formattedSumOfCarbon','sumOfTransaksi','sumOfPlant', 'sumOfPlantVerif', 'topFive'));
        }
    }

    public function formRegis()
    {
        $getProv = DB::table('DLH')->select('provinsi')->get();
        return view('regisUSer', compact('getProv'));
    }

    public function sendRegis(Request $request)
    {
        $regis = new User;
        $regis->perusahaan = $request->input('perusahaan');
        $regis->name = $request->input('username');
        $regis->password = $request->input('password');
        $regis->email = $request->input('email');
        $regis->provinsi = $request->input('provinsi');
        $regis->status = "Belum Terverifikasi";
        $regis->save();


        // $transaksi = new ModelTransaksi;
        // $transaksi->idUser = $regis->id;
        // $transaksi->save();

        return redirect('/portal')->with('Accepted', 'Berhasil Registarasi Akun, Silahkan Login.');
    }


    public function notVerif()
    {
        return view('notVerif');
    }

    public function addPlant()
    {
        return view('user.addPlant');
    }

    public function manageProfil()
    {
        return view('user.profile');
    }

    public function updateProfil($id, Request $request)
    {
        $update = User::findOrFail($id);
        $update->name = $request->input('field_username');
        $update->email = $request->input('field_email');
        $update->lokasi = $request->input('field_alamat');

        $fotoDirectory = 'public/uploads/Profil-User';
        if ($request->hasFile('field_foto')) {
            $file = $request->file('field_foto');
            $originalName = $file->getClientOriginalName(); // Ambil nama asli file
            $file->storeAs($fotoDirectory, $originalName);
            $update->foto = $originalName; // Simpan nama asli file ke database
        }


        $update->save();

        return redirect('/setProfile')->with('berhasil', 'Profil Berhasil Diperbaharui');
    }

    public function showPlant($id)
    {
        $idUser = Auth::guard('swasta')->id();
        $getPlant = DB::table('plant')->where('idUser', $idUser)->get();
        $countnotVerifPlant = DB::table('plant')->where('idUser', $idUser)->where('status', 0)->count();
        $countVerifPlan = DB::table('plant')->where('idUser', $idUser)->where('status', 1)->count();
        return view('user.dataPlant', compact('getPlant', 'countnotVerifPlant','countVerifPlan'));
    }

    public function addPlantbyUser(Request $request)
    {
        $save = new ModelPlant;
        $save->jenis = $request->input('field_jenis');
        $save->tinggi = $request->input('field_tinggi');
        $save->diameter = $request->input('field_diameter');
        $save->warna_daun = $request->input('field_warna');
        $save->lokasi = $request->input('lokasi');
        $save->idUser = $request->input('field_idUser');
        $save->umur = $request->input('field_umur');
        $save->status = 0;

        // Periksa apakah file diunggah
        if ($request->hasFile('field_foto')) {
            $file = $request->file('field_foto');
            $originalName = $file->getClientOriginalName();

            // Simpan file ke direktori yang ditentukan
            $fotoDirectory = 'public/uploads/Plant-user';
            $filePath = $file->storeAs($fotoDirectory, $originalName);

            // Simpan nama file ke database
            $save->foto = $originalName;
        }

        $save->save();



        return redirect('/showAllPlant/{id}')->with('berhasil', 'Tanaman Berhasil Ditambahkan');
    }


    public function claimCreditCarbon()
    {
        $idUser = Auth::guard('swasta')->id();
        $sumOfCarbon = DB::table('plant')
                ->join('users', 'plant.idUser', '=', 'users.id')
                ->where('users.id', $idUser)
                ->where('plant.status', 1)
                ->sum('plant.totalCarbon');

        $formattedSumOfCarbon = number_format($sumOfCarbon, 2);

        $countHistory = DB::table('transaksi')->where('idUser', $idUser)->where('status', 0)->count();
        $getHistory = DB::table('transaksi')->where('idUser', $idUser)->where('status', 0)->get();
        // $cekHistory = DB::table('plant')->where('idUser', $idUser)->where('totalCarbon', '>', 0)->sum('totalCarbon');
        $cekHistory = DB::table('transaksi')
                ->where('idUser', $idUser)
                ->value('sumOfCarbon');

        $cekHistoryVerif = DB::table('transaksi')->where('idUser', $idUser)->where('status', 1)->count();
        $sumOfCarbonByDjp = DB::table('transaksi')->select('sumOfCarbon', 'sumOfPoint')->where('idUser', $idUser)->where('status', 0)->first();
        // $cekHistoryDjp = DB::table('transaksi')->where('idUser', $idUser)->where('status', 1)->count();
        // $getHistoryDjp = DB::table('transaksi')->where('idUser', $idUser)->where('status', 1)->get();

        return view('user.claimCreditCarbon', compact('formattedSumOfCarbon', 'countHistory', 'sumOfCarbon', 'getHistory', 'cekHistory', 'sumOfCarbonByDjp','cekHistoryVerif'));
    }

    public function claimToDjp(Request $request)
    {
        $save = new ModelTransaksi;
        $save->sumOfCarbon = $request->input('sumOfCarbon');
        $save->sumOfPoint = $request->input('sumOfCarbon')*100;
        $save->idUser = $request->input('idUser');
        $save->status = 0;
        $save->save();

        $idUser = Auth::guard('swasta')->id();

        $idTransaksiBaru = $save->idTransaksi;
        $update = DB::table('plant')
            ->where('idUser', $idUser)
            ->where('totalCarbon', '>', 0)
            ->update(['idTransaksi' => $idTransaksiBaru]);

        return redirect('/claimCreditCarbon')->with('berhasil', 'Point Credit Carbon Berhasil Diajukan');
    }

    public function historyClaimCarbon()
    {
        $idUser = Auth::guard('swasta')->id();
        $getHistory = DB::table('transaksi')->where('idUser', $idUser)->where('status', 1)->get();
        $getHistoryCount = DB::table('transaksi')->where('idUser', $idUser)->where('status', 1)->count();

        return view('user.historyClaimCarbon', compact('getHistory','getHistoryCount'));
    }

    public function listHistoryClaim ()
    {
        $idUser = Auth::guard('swasta')->id();
        $getHistoryUser = DB::table('transaksi')->where('idUser', $idUser)->where('status', 1)->get();
        return view('user.historyTransaksi', compact('getHistoryUser'));
    }

    public function invoice($id)
    {

        $idUser = Auth::guard('swasta')->id();
        $getUser = Auth::guard('swasta')->user();
        $transactions = ModelPlant::with('transaksi', 'users')->where('idTransaksi', $id)->where('idUser', $idUser)->get();

        $getSumPoint = ModelTransaksi::select('sumOfPoint','sumOfCarbon', 'updated_at')->where('idTransaksi', $id)->first();
        return view('user.invoice', compact('transactions','getUser','getSumPoint'));
    }

    public function readArtikel($id)
    {
        $getId = ModelArtikel::where('id', $id)->first();
        return view('user.viewArtikel', compact('getId'));
    }
}
