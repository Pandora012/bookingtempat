<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\ViewController;
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

Route::get('/antrian', [PesananController::class, 'index']);
Route::get('/booking', [PesananController::class, 'create']);
Route::post('/booking', [PesananController::class, 'store']);

Route::get('/', [ViewController::class, 'index']);
Route::get('/akun', [ViewController::class, 'profile']);


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
