<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PinjamController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('index');
});

Route::get('buku',[BukuController::class,'bukutampil']);
Route::post('bukutambah',[BukuController::class,'bukutambah']);
Route::get('buku/hapus/{id_buku}',[BukuController::class,'bukuhapus']);
Route::put('bukuedit/edit/{id_buku}',[Bukucontroller::class,'bukuedit']);


Route::get('/home', function(){return view('view_home');});



Route::get('petugas',[PetugasController::class,'Petugastampil']);
Route::post('/petugas/tambah', 'PetugasController@petugastambah');
Route::get('/petugas/hapus/{id_petugas}', 'petugasController@petugashapus');
Route::put('/petugas/edit/{id_petugas}', 'petugasController@petugasedit');


