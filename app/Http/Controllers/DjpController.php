<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ModelDlh;
use App\Models\User;
use App\Models\ModelPlant;
use App\Models\ModelArtikel;
use App\Models\ModelTransaksi;
use Carbon\Carbon;

class DjpController extends Controller{

    public function index(){
        $totalPengajuan = DB::table('transaksi')->count();
        $totalPending = DB::table('transaksi')->where('status', 0)->count();
        $totalValidasi = DB::table('transaksi')->where('status', 1)->count();
        $totalUser = DB::table('transaksi')->distinct()->count('idUser');


        $topCompanies = User::select('users.perusahaan', 'users.provinsi', \DB::raw('SUM(transaksi.sumOfPoint) as totalPoint'))
                    ->join('transaksi', 'users.id', '=', 'transaksi.idUser')
                    ->where('transaksi.status', 1)
                    ->groupBy('users.perusahaan', 'users.provinsi')
                    ->orderByDesc('totalPoint')
                    ->limit(10)
                    ->get();

        $transactions = DB::table('transaksi')
                    ->join('users', 'transaksi.idUser', '=', 'users.id')
                    ->select('users.perusahaan', 'transaksi.sumOfPoint', 'transaksi.created_at')
                    ->where('transaksi.status', 1)
                    ->get();

        // Ubah format tanggal menjadi ISO 8601
        $transactions->transform(function ($item, $key) {
                    $item->created_at = Carbon::parse($item->created_at)->toIso8601String();
                    return $item;
                });

        $transactionByCompany = $transactions->groupBy('perusahaan');

                $series = [];
                foreach ($transactionByCompany as $perusahaan => $transactions) {
                    $data = [];
                    foreach ($transactions as $transaction) {
                        $data[] = $transaction->sumOfPoint;
                    }
                    $series[] = [
                        'name' => $perusahaan,
                        'data' => $data,
                    ];
                }

        $seriesJson = json_encode($series);

        $getArtikel = ModelArtikel::where('status', "Publish")->get();

        return view('DJP.index', compact('getArtikel','totalPengajuan','totalPending','totalValidasi','totalUser','topCompanies','transactions','seriesJson'));
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

        $getCarbonOri = ModelPlant::where('idTransaksi', $id)->pluck('totalCarbon')->all();


        $update = ModelTransaksi::findOrFail($id);
        // $update->sumOfCarbon = 0;
        // $update->sumOfPoint = 0;
        $update->status = 1;
        $update->save();

        $getIdUsers = $request->input('getIdUser');
        $idPlants = ModelPlant::where('idUser', $getIdUsers)
                       ->where('idTransaksi', $id)
                       ->where('status', 1)
                       ->pluck('idPlant');

        // Iterasi melalui setiap idPlant dan update nilai transactionCarbon
        foreach ($idPlants as $idPlant) {
            $carbonOri = array_shift($getCarbonOri);
            ModelPlant::where('idPlant', $idPlant)->update(['totalCarbon' => 0, 'transactionCarbon' => $carbonOri]);
        }

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

    public function readArtikel($id)
    {
        $getId = ModelArtikel::where('id', $id)->first();
        return view('DJP.viewArtikel', compact('getId'));
    }



}


