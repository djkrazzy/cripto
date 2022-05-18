<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TransaccionController;
use App\Http\Controllers\Admin\UserTransaccionController;

Route::get('', [HomeController::class, 'index']);


Route::resource('transacciones', TransaccionController::class)->names('admin.transacciones');

Route::resource('userTransacciones', UserTransaccionController::class)->names('user.usertransacciones');