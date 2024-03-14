<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DlhController;
use App\Http\Controllers\KlhController;
use App\Http\Controllers\DjpController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['web'])->group(function (){
    Route::get('/portal', function () {
        return view('login');
    })->name('login');

    // Registrasi KLH
    Route::get('/regisKlh', function(){
        return view('regisKlh');
    });
    Route::post('/sendRegis', [KlhController::class, 'Register']);

    // Registrasi DLH
    Route::get('/regisDlh', function(){
        return view('regisDlh');
    });
    Route::post('/sendRegisDlh', [DlhController::class, 'Register']);

    // Registrasi User
    Route::get('/regisUser', [UserController::class, 'formRegis']);
    Route::post('/sendRegisUser', [UserController::class, 'sendRegis']);

    Route::post('/LoginAuth', [AuthController::class, 'loginUser']);
});

Route::get('/', function () {
    return view('welcome');
});


// Route Super Admin
Route::middleware(['auth:admin'])->group(function (){
    Route::get('/dashboardAdmin', [AdminController::class, 'index'])->name('dashboardAdmin');
    Route::get('/logoutAdmin', [AuthController::class, 'logoutAdmin']);
    Route::get('/artikel', [AdminController::class, 'artikel']);
    Route::post('/saveArtikel', [AdminController::class, 'saveArtikel']);
    Route::get('/manageArtikel', [AdminController::class, 'manageArtikel']);
    Route::get('/readArtikel/{id}', [AdminController::class, 'readArtikel']);
    Route::get('/destroyArtikel/{id}', [AdminController::class, 'destroyArticle']);
    Route::get('/editArtikel/{id}', [AdminController::class, 'editArtikel']);
    Route::post('/editingArtikel/{id}', [AdminController::class, 'editingArtikel']);
    Route::get('/companyUser/{id}', [AdminController::class, 'company']);
    Route::get('/DLHUser/{id}', [AdminController::class, 'dlh']);
    Route::get('/KLHUser/{id}', [AdminController::class, 'klh']);
    Route::get('/DJPUser/{id}', [AdminController::class, 'djp']);
});

// Route User/Swasta
Route::group(['middleware' => 'user.data'], function () {
    Route::get('/dashboardSwasta/{id}', [UserController::class, 'index'])->name('dashboardSwasta');
    Route::get('/logoutUser', [AuthController::class, 'logoutUser']);
    Route::get('/notVerif', [UserController::class, 'notVerif']);
    Route::get('/addPlant', [UserController::class, 'addPlant']);
    Route::get('/setProfile', [UserController::class, 'manageProfil']);
    Route::post('/updateProfil/{id}', [UserController::class, 'updateProfil']);
    Route::get('/showAllPlant/{id}', [UserController::class, 'showPlant']);
    Route::post('/addPlantbyUser', [UserController::class, 'addPlantbyUser']);
    Route::get('/claimCreditCarbon', [UserController::class, 'claimCreditCarbon']);
    Route::post('/claimToDjp', [UserController::class, 'claimToDjp']);
    Route::get('/historyClaimCarbon', [UserController::class, 'historyClaimCarbon']);
    Route::get('/viewHistory', [UserController::class, 'listHistoryClaim']);
    Route::get('/invoice/{id}', [UserController::class, 'invoice']);
    Route::get('/readArtikel/{id}', [UserController::class, 'readArtikel']);
});

// Route Dinas Lingkungan Hidup
Route::group(['middleware' => 'dlh.data'], function () {
    Route::get('/dashboardDlh/{id}', [DlhController::class, 'index'])->name('dashboardDLH');
    Route::get('/logoutDlh', [AuthController::class, 'logoutDlh']);
    Route::get('/hitungCarbon', [DlhController::class, 'hitungCarbon']);
    Route::get('/manageUser', [DlhController::class, 'manageUser']);
    Route::post('/verifUser/{id}', [DlhController::class, 'verifUser']);
    Route::get('/detailUser', [DlhController::class, 'detailUser']);
    Route::get('/showPlant', [DlhController::class, 'showPlant']);
    Route::get('/detailPlant/{id}', [DlhController::class, 'detailPlant']);
    Route::post('/hitungCarbonTanaman', [DlhController::class, 'hitungCarbonTanaman'])->name('hitungCarbonTanaman');
    Route::get('/historyVerifPlant', [DlhController::class, 'historyVerifPlant']);
});

// Route Kementrian Lingkungan hidup
Route::middleware(['auth:klh'])->group(function (){
    Route::get('/dashboardKlh', [KlhController::class, 'index'])->name('dashboardKLH');
    Route::get('/logoutklh', [AuthController::class, 'logoutKlh']);
    Route::get('/managedlh', [KlhController::class, 'manageDlh']);
    Route::post('/sendVerifDlh/{id}', [KlhController::class, 'verifDlh']);
});

// Route Direktoral Jenderal Pajak
Route::middleware(['auth:djp'])->group(function (){
    Route::get('/dashboardDjp', [DjpController::class, 'index'])->name('dashboardDJP');
    Route::get('/pengajuanPoinCarbon', [DjpController::class, 'showPengajuan']);
    Route::post('/approvalCreditCarbon/{id}', [DjpController::class, 'approvalClaimPoint']);
    Route::post('/logoutAdmin', [AuthController::class, 'logoutAdmin']);
    Route::get('/historyApproval', [DjpController::class, 'historyApproval']);
});


