<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CryptController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HaloController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ValidateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

Route::get('/blog', [BlogController::class, 'home']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
Route::post('/pegawai/store', [PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus']);
Route::get('/pegawai/cari', [PegawaiController::class, 'cari']);
Route::get('/pegawai/cetak_pdf', [PegawaiController::class, 'cetak_pdf']);
Route::get('/pegawai/export_excel', [PegawaiController::class, 'export_excel']);
Route::post('/pegawai/import_excel', [PegawaiController::class, 'import_excel']);

Route::get('/input', [ValidateController::class, 'input']);
Route::post('/proses', [ValidateController::class, 'proses']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'tambah']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/hapus/{id}', [MahasiswaController::class, 'hapus']);
Route::get('/mahasiswa/trash', [MahasiswaController::class, 'trash']);
Route::get('/mahasiswa/kembalikan/{id}', [MahasiswaController::class, 'kembalikan']);
Route::get('/mahasiswa/kembalikan_semua', [MahasiswaController::class, 'kembalikan_semua']);
Route::get('/mahasiswa/hapus_permanen/{id}', [MahasiswaController::class, 'hapus_permanen']);

Route::get('/pengguna', [PenggunaController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/crypt', [CryptController::class, 'crypt']);
Route::get('/data', [CryptController::class, 'data']);
Route::get('/data/{data_rahasia}', [CryptController::class, 'data_proses']);
Route::get('/hash', [CryptController::class, 'hash']);

Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'upload_proses']);
Route::get('/upload/hapus/{id}', [UploadController::class, 'hapus']);

Route::get('/session/tampil', [TesController::class, 'tampil']);
Route::get('/session/buat', [TesController::class, 'buat']);
Route::get('/session/hapus', [TesController::class, 'hapus']);

Route::get('/pesan', [NotifController::class, 'index']);
Route::get('/pesan/sukses', [NotifController::class, 'sukses']);
Route::get('/pesan/peringatan', [NotifController::class, 'peringatan']);
Route::get('/pesan/gagal', [NotifController::class, 'gagal']);

// Route::get('/error', [ErrorController::class, 'gagal']);
Route::get('/404', function () {
    return abort(404);
});
Route::get('/500', function () {
    return abort(500, 'Servernya lagi error nih gan...');
});

Route::get('/kirimemail', [MailController::class, 'index']);

Route::view('/biodata', 'biodata');

Route::get('/{locale}/form', function ($locale) {
    App::setLocale($locale);
    return view('biodata');
});

Route::get('/halo/{nama}', [HaloController::class, 'halo'])->name('panggil');
Route::get('/halo', [HaloController::class, 'panggil']);
