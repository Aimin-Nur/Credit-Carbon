<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ModelArtikel;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function artikel()
    {
        return view('admin.artikel');
    }

    public function saveArtikel(Request $request)
    {
        $saveArtikel = new ModelArtikel();

        $saveArtikel->status = $request->input('field_status');
        $saveArtikel->kategori = $request->input('field_kategori');
        $saveArtikel->isi = nl2br($request->input('field_artikel'));


        if ($request->hasFile('field_foto')) {
            $file = $request->file('field_foto');
            $originalName = $file->getClientOriginalName(); // Ambil nama asli file

            // Simpan file ke direktori yang ditentukan
            $fotoDirectory = 'public/uploads/Artikel';
            $filePath = $file->storeAs($fotoDirectory, $originalName);

            // Simpan nama file ke database
            $saveArtikel->gambar = $originalName;
        }

        $saveArtikel->save();
        return redirect('/artikel')->with('Berhasil', 'Artikel Berhasil ditambhakan.');
    }

    public function manageArtikel()
    {
        $getArtikel = DB::table('artikel')->get();
        // $getArtikel = explode("\n", $get);
        return view('admin.manageArtikel', compact('getArtikel'));
    }

    public function readArtikel()
    {
        return view('admin.viewArtikel');
    }
}

