<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarBASTController;
use App\Http\Controllers\RekapBASTController;
use App\Http\Controllers\KelolaDokumenController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\AddDokumenController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', [DashboardController::class, 'index'])->name('dashboard/index');
Route::resource('/', \App\Http\Controllers\DashboardController::class);
Route::get('/', function () {
    // Ganti dengan URL atau route yang ingin Anda belokkan
    return Redirect::to('/login');
});


Route::get('daftarBAST', [DaftarBASTController::class, 'index'])->name('daftarBAST/index');

Route::get('rekapBAST', [RekapBASTController::class, 'index'])->name('rekapBAST/index');

Route::get('kelolaDokumen', [KelolaDokumenController::class, 'index'])->name('kelolaDokumen/index');

Route::get('suratMasuk', [SuratMasukController::class, 'index'])->name('suratMasuk/index');
Route::get('suratMasuk/view/{id}', [SuratMasukController::class, 'view']);
Route::get('suratMasuk/download/{id}', [SuratMasukController::class, 'download']);

Route::get('suratKeluar', [SuratKeluarController::class, 'index'])->name('suratKeluar/index');
Route::get('suratKeluar/show/{id}', [SuratKeluarController::class, 'show'])->name('suratKeluar/show');
Route::get('suratKeluar/download/{id}', [SuratKeluarController::class, 'download']);

Route::get('addDokumen', [AddDokumenController::class, 'index'])->name('addDokumen/index');
Route::post('addDokumen/search', [AddDokumenController::class, 'search'])->name('addDokumen/search');

Route::post('simpanDokumen', [AddDokumenController::class, 'store'])->name('simpanDokumen/store');
Route::get('editDokumen/edit/{id}', [AddDokumenController::class, 'edit'])->name('editDokumen/edit');
Route::delete('hapusDokumen/hapus/{id}', [AddDokumenController::class, 'delete'])->name('hapusDokumen/hapus');
// Route::delete('posts/{post}/destroy', [AddDokumenController::class, 'delete'])->name('posts.destroy');
Route::post('updateDokumen/update', [AddDokumenController::class, 'update'])->name('updateDokumen/update');
Route::put('kelolaDokumen/send/{id}', [AddDokumenController::class, 'send'])->name('kelolaDokumen/send');
// Route::put('/kelolaDokumen/send/{id}', 'AddDokumenController@send')->name('kelolaDokumen/send');

Route::get('kelolaKaryawan', [KelolaDokumenController::class, 'kelolaKaryawan'])->name('kelolaKaryawan');
// Route::delete('kelolaKaryawan/hapus/{id}', [KelolaDokumenController::class, 'deleteKelolaKaryawan'])->name('kelolaKaryawan/hapus');
// Route::get('kelolaKaryawan/edit/{id}', [KelolaDokumenController::class, 'editKelolaKaryawan'])->name('kelolaKaryawan/edit');
Route::put('kelolaKaryawan/update/{id}', [KelolaDokumenController::class, 'update'])->name('kelolaKaryawan/update');


Route::get('upload', [UploadController::class, 'index'])->name('upload/index');
Route::post('prosesUpload', [UploadController::class, 'upload'])->name('prosesUpload');

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// //INDEX
// Route::get('/', [LoginController::class, 'index'])->middleware('guest');

// //AUTH MANUAL
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
// Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// //DASHBOARD
// Route::resource('dashboard', 'DashboardController')->except(['show'])->middleware('auth');
// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
