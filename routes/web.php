<?php

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\LoginController;

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



Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth']);
Route::get('/daftar', [LoginController::class, 'daftar']);
Route::post('/regis', [LoginController::class, 'regis']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/arsip', ArsipController::class);
    Route::resource('/admin', AdminController::class);

    Route::get('/logout', [LoginController::class, 'logout']);
});


Route::get('cek', function () {
    // Auth::logout();
    dd(Auth::user());
});
Route::get('migrate', function () {
    Artisan::call('migrate:fresh --seed');
    dd(Artisan::output());
});
Route::get('storage', function () {
    Artisan::call('storage:link');
    dd(Artisan::output());
});
