<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailabsensiController;
use App\Http\Controllers\WalisiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\NilaiController;
use App\Models\Absensi;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
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

Route::get('/',[AdminController::class,'dashboard']);

Auth::routes();
Route::post('/logout', [loginController::class, 'logout']);

Route::group(['middleware' => ['auth','role:Admin'], 'prefix' => 'admin'],function () {
    Route::get('/dashboard',[AdminController::class, 'index']);
    Route::resource('/datasiswa',WalisiswaController::class);
    Route::resource('/dataguru',GuruController::class);
    Route::resource('/datakelas',KelasController::class);
    Route::resource('/datamapel',MapelController::class);
    
    Route::get('/walikelas/{id}',[KelasController::class,'show']);
    Route::put('/walikelas/{id}',[KelasController::class,'update']);
    
    Route::get('/tambahpengampu',[MapelController::class,'tambahpengampu']);
    Route::get('/ambilpengampu/{id}',[MapelController::class,'ambilpengampu']);
    Route::put('/inputpengampu/{id}',[MapelController::class,'inputpengampu']);
});

Route::group(['middleware' => ['auth','role:Guru'], 'prefix' => 'guru'],function () {
    Route::get('/dashboard',[GuruController::class, 'ShowDsGuru']);
    
    Route::get('/profile',[GuruController::class,'profile']);
    Route::put('/editprofile/{id}',[GuruController::class,'profile_edit']);
    Route::post('/changePassword',[GuruController::class,'changePassword']);
    Route::get('/datasiswa',[GuruController::class,'showsiswa']);
    Route::get('/datasiswa/{id}',[GuruController::class,'detailsiswa']);

    

    Route::resource('/absensi',AbsensiController::class);
    Route::POST('/pertemuan',[AbsensiController::class,'pertemuan']);
    Route::resource('/detailabsen',DetailabsensiController::class);

    Route::resource('/nilaisiswa',NilaiController::class);
    Route::post('/getnilaisiswa',[NilaiController::class,'getsiswa']);

});


Route::group(['middleware' => ['auth','role:WaliSiswa'], 'prefix' => 'walisiswa'],function () {
    Route::get('/dashboard',[WalisiswaController::class, 'ShowDsWalisiswa']);
    Route::get('/profile',[WalisiswaController::class, 'showprofile']);
    Route::put('/editprofile/{id}',[WalisiswaController::class, 'editprofile']);
    Route::post('/changePassword',[GuruController::class,'changePassword']);
    Route::get('/lihatpresensi',[AbsensiController::class,'lihatpresensi']);
    Route::get('/lihatnilai',[NilaiController::class,'lihatnilai']);
    Route::get('/getnilaimapel/{id}',[NilaiController::class,'nilaimapel']);


});
