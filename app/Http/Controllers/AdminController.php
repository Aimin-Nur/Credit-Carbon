<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\ModelArtikel;
use App\Models\User;
use App\Models\ModelDLH;
use App\Models\ModelKLH;
use App\Models\ModelDJP;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function company()
    {
        $getUser = User::get();

        $verif = "Terverifikasi";
        $getVerif = User::where('status', $verif)->count();

        $notVerif = "Belum Terverifikasi";
        $getNotVerif = User::where('status', $notVerif)->count();
        return view('admin.company', compact('getUser', 'getVerif','getNotVerif'));
    }

    public function dlh ()
    {
        $getUser = ModelDLH::get();

        $verif = "Terverifikasi";
        $getVerif = ModelDlh::where('status', $verif)->count();

        $notVerif = "Belum Terverifikasi";
        $getNotVerif = ModelDlh::where('status', $notVerif)->count();
        return view('admin.dlh', compact('getUser', 'getVerif','getNotVerif'));
    }

    public function djp()
    {
        $getUser = ModelDJP::get();
        return view('admin.Djp', compact('getUser'));
    }

    public function klh()
    {
        $getUser = ModelKlh::get();
        return view('admin.klh', compact('getUser'));
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
        $publish = "Publish";
        $artikelPublish = ModelArtikel::where('status', $publish)->count();

        $draft = "Draf";
        $artikelDraft = ModelArtikel::where('status', $draft)->count();
        return view('admin.manageArtikel', compact('getArtikel','artikelPublish','artikelDraft'));
    }

    public function readArtikel()
    {
        return view('admin.viewArtikel');
    }

    public function destroyArticle($id)
    {
        $delete = DB::table('artikel')->where('id', $id)->delete();

        if ($delete) {
            return redirect()->back()->with('hapus', 'Artikel berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Artikel gagal dihapus.');
        }
    }

    public function editArtikel($id)
    {
        $getArtikel = DB::table('artikel')->where('id', $id)->first();
        return view('admin.editArtikel', compact('getArtikel'));
    }

    public function editingArtikel($id, Request $request)
    {
        // Mengambil data artikel berdasarkan ID
        $saveArtikel = ModelArtikel::find($id);

        // Memperbarui nilai status, kategori, dan isi artikel
        $saveArtikel->status = $request->input('field_status');
        $saveArtikel->kategori = $request->input('field_kategori');
        $saveArtikel->isi = nl2br($request->input('field_artikel'));

        // Memeriksa apakah ada file gambar yang diunggah
        if ($request->hasFile('field_foto')) {
            $file = $request->file('field_foto');
            $originalName = $file->getClientOriginalName(); // Ambil nama asli file

            // Simpan file ke direktori yang ditentukan
            $fotoDirectory = 'public/uploads/Artikel';
            $filePath = $file->storeAs($fotoDirectory, $originalName);

            // Simpan nama file gambar ke database
            $saveArtikel->gambar = $originalName;
        }

        // Menyimpan perubahan ke dalam database
        $saveArtikel->save();
        return redirect('/manageArtikel')->with('berhasil', 'Artikel Berhasil diEdit.');
    }

}

