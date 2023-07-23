<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);

Route::middleware('admin')->group(function () {
Route::get('/kategori',[KategoriController::class,'index']);
Route::post('/kategori/add',[KategoriController::class,'store']);
Route::get('/kategori/edit/{id}',[KategoriController::class,'edit']);
Route::patch('/kategori/update/{id}',[KategoriController::class,'update']);
Route::get('/kategori/delete/{id}',[KategoriController::class,'delete']);
Route::delete('/kategori/destroy/{id}',[KategoriController::class,'destroy']);
});

Route::middleware('login')->group(function () {
Route::get('/logout',[UserController::class,'logout']);
Route::patch('/profile',[UserController::class,'profile']);
Route::resource('/buku',BukuController::class);
Route::get('/buku/edit/{id}',[BukuController::class,'edit']);
Route::get('/buku/delete/{id}',[BukuController::class,'delete']);
});