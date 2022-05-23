<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\Admin\TransaccionController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserTransaccionController;

Route::get('', [HomeController::class, 'index']);

//Transacciones de ususario
Route::post('/retirarDeposito', [TransaccionesController::class, 'retirarDeposito'])->name('retirarDeposito');
Route::post('/retirarBitcoin', [TransaccionesController::class, 'retirarBitcoin'])->name('retirarBitcoin');
Route::post('/enviarDeposito', [TransaccionesController::class, 'enviarDeposito'])->name('enviarDeposito');
Route::post('/enviarBitcoin', [TransaccionesController::class, 'enviarBitcoin'])->name('enviarBitcoin');


Route::resource('transacciones', TransaccionController::class)->names('admin.transacciones');

Route::resource('user', UserController::class)->names('admin.user');

Route::get('/admin/configuracion', [ConfiguracionController::class, 'show'])->name('admin.configuracion');
Route::post('ckeditor/upload', [ConfiguracionController::class, 'upload'])->name('ckeditor.image-upload');


Route::resource('userTransacciones', UserTransaccionController::class)->names('user.usertransacciones');

