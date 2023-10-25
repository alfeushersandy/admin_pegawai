<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Karyawan3bulanController;
use App\Http\Controllers\KaryawankeluarController;
use App\Http\Controllers\Surat_keputusanController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\KaryawanKeluarController as ControllersKaryawanKeluarController;
use App\Http\Controllers\UbahPasswordController;

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
    if(auth()->user()){
        return redirect('/dashboard');
    }else{
        return view('auth.login');
    }
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/about', [DashboardController::class, 'about']);
//route karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/aktif', [KaryawanController::class, 'show']);
Route::get('/karyawan/input', [KaryawanController::class, 'input']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update']);
Route::get('/karyawan/hapus', [KaryawanController::class, 'hapusSession']);
Route::get('karyawan/detail/{id}', [KaryawanController::class, 'detail']);
Route::get('karyawan/tampils/{id}', [KaryawanController::class, 'tampil_pdf']);
Route::get('karyawan/keluar/{id}', [KaryawanController::class, 'keluar']);
Route::post('karyawan/confirmkeluar/{id}', [KaryawanController::class, 'keluarkan']);
Route::get('/karyawan/export', [KaryawanController::class, 'export_excel']);

Route::get('/keluar', [KaryawanController::class, 'karyawan_keluar']);
Route::get('/keluar/{id}', [KaryawanController::class, 'edit_karyawan_keluar']);
Route::post('/keluar/confirmkeluar/{id}', [KaryawanController::class, 'update_keluar']);
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/sop',[SopController::class, 'index'])->name('sop.index');
Route::get('/sop/upload',[SopController::class, 'create']);
Route::get('/sop/edit/{id}',[SopController::class, 'show']);
Route::put('/sop/update/{id}',[SopController::class, 'update']);
Route::post('/sop/store', [SopController::class, 'store']);
Route::post('/delete/sop/{id}', [SopController::class, 'destroy'])->name('sop.destroy');
Route::get('/sop/tampil/{uploaded_file}', [SopController::class, 'tampil_pdf']);

Route::get('/form',[FormController::class, 'index'])->name('form.index');
Route::get('/form/upload',[FormController::class, 'create']);
Route::post('/form/store', [FormController::class, 'store']);
Route::get('/form/edit/{id}',[FormController::class, 'show']);
Route::put('/form/update/{id}',[FormController::class, 'update']);
Route::post('/delete/form/{id}', [FormController::class, 'destroy'])->name('form.destroy');
Route::get('/form/tampil/{uploaded_file}', [FormController::class, 'tampil_pdf']);

Route::get('/surat_keputusan',[Surat_keputusanController::class, 'index']);
Route::get('/surat_keputusan/upload',[Surat_keputusanController::class, 'create']);
Route::post('/surat_keputusan/store', [Surat_keputusanController::class, 'store']);
Route::get('/surat_keputusan/edit/{id}',[Surat_keputusanController::class, 'show']);
Route::put('/surat_keputusan/update/{id}',[Surat_keputusanController::class, 'update']);
Route::post('/delete/surat_keputusan/{id}', [Surat_keputusanController::class, 'destroy'])->name('sk.destroy');
Route::get('/surat_keputusan/tampil/{uploaded_file}', [Surat_keputusanController::class, 'tampil_pdf']);

Route::get('/karyawan/3_bulan', [Karyawan3bulanController::class, 'index']);

Route::get('/ubah-password', [UbahPasswordController::class, 'index']);
Route::post('/ubah-password/store', [UbahPasswordController::class, 'store']);

Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
