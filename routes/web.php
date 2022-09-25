<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
// Admins
Route::get('/ad', [AdminController::class, 'index'])->name('adhome'); 
Route::get('/ad/register_ad', [App\Http\Controllers\Admin\AuthController::class, 'getRegister']);
Route::post('/ad/register', [App\Http\Controllers\Admin\AuthController::class, 'postRegister']);
Route::get('/adhome', [App\Http\Controllers\Admin\AuthController::class, 'getLogin']);
Route::post('/ad/login', [App\Http\Controllers\Admin\AuthController::class, 'postLogin']);
Route::get('/ad/guimaxacnhanqmk', [AdminController::class, 'getADGuiMaXacNhanQuenMatKhau']);
Route::post('/ad/guimaxacnhanqmk', [AdminController::class, 'postADGuiMaXacNhanQuenMatKhau']);
Route::post('/ad/nhapmaxacnhanqmk', [AdminController::class, 'postADNhapMaXacNhanQuenMatKhau']);
Route::post('/ad/taomoimk', [AdminController::class, 'postADTaoMoiMatKhau']);
Route::get('/ad/dashboard', [AdminController::class, 'getIndex']);
Route::get('/ad/logout', [AdminController::class, 'getLogout']);
