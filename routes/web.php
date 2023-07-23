<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
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

Route::get('/home', function () {
    return view('master');
});

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/logout',[UserController::class,'logout']);
Route::patch('/profile',[UserController::class,'profile']);

Route::get('/kategori',[KategoriController::class,'index']);
Route::post('/kategori/add',[KategoriController::class,'store']);
Route::get('/kategori/edit/{id}',[KategoriController::class,'edit']);
Route::patch('/kategori/update/{id}',[KategoriController::class,'update']);
Route::get('/kategori/delete/{id}',[KategoriController::class,'delete']);
Route::delete('/kategori/destroy/{id}',[KategoriController::class,'destroy']);

// Route::get('/buku',[BukuController::class,'index']);
// Route::post('/buku/add',[BukuController::class,'store']);
// Route::get('/buku/edit/{id}',[BukuController::class,'edit']);
// Route::patch('/buku/update/{id}',[BukuController::class,'update']);
// Route::get('/buku/delete/{id}',[BukuController::class,'delete']);
// Route::delete('/buku/destroy/{id}',[BukuController::class,'destroy']);
Route::resource('/buku',BukuController::class);
Route::get('/buku/edit/{id}',[BukuController::class,'edit']);
Route::get('/buku/delete/{id}',[BukuController::class,'delete']);