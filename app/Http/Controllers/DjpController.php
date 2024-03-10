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

class DjpController extends Controller{

    public function index(){
        $totalPengajuan = DB::table('transaksi')->count();
        $totalPending = DB::table('transaksi')->where('status', 0)->count();
        $totalValidasi = DB::table('transaksi')->where('status', 1)->count();
        $totalUser = DB::table('transaksi')->distinct()->count('idUser');


        $topCompanies = User::select('users.perusahaan', 'users.provinsi', \DB::raw('SUM(CASE WHEN plant.totalCarbon > 0 THEN plant.totalCarbon ELSE plant.transactionCarbon END) as totalCarbon'))
                            ->join('plant', 'users.id', '=', 'plant.idUser')
                            ->groupBy('users.perusahaan', 'users.provinsi')
                            ->orderByDesc('totalCarbon')
                            ->limit(10)
                            ->get();


        return view('DJP.index', compact('totalPengajuan','totalPending','totalValidasi','totalUser','topCompanies'));
    }

    public function showPengajuan()
    {
        $getData = ModelTransaksi::where('status', 0)
            ->with('users')
            ->get();

        $sumOfTransaksi = DB::table('transaksi')->count();
        $sumOfWaiting = DB::table('transaksi')->where('status', 0)->count();
        return view('DJP.pengajuanPoin', compact('getData', 'sumOfTransaksi', 'sumOfWaiting'));
    }

    public function approvalClaimPoint($id, Request $request)
    {

        $update = ModelTransaksi::findOrFail($id);
        // $update->sumOfCarbon = 0;
        // $update->sumOfPoint = 0;
        $update->status = 1;
        $update->save();

        $getCarbon = $request->input('getCarbon');
        $getIdUsers = $request->input('getIdUser');
        $getZero = DB::table('plant')
                    ->where('idUser', $getIdUsers)
                    ->where('status', 1)
                    ->update(['totalCarbon' => 0, 'transactionCarbon' => $getCarbon]);

        return redirect('/pengajuanPoinCarbon')->with('berhasil', 'Poin Credit Carbon User Berhasil di Claim');
    }

    public function historyApproval()
    {
        $getData = ModelTransaksi::where('status', 1)
        ->with('users')
        ->get();

        $sumOfTransaksi = DB::table('transaksi')->count();
        return view('DJP.historyPengajuan', compact('getData','sumOfTransaksi'));
    }



}


