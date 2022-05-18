<?php
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Mail\TransaccionRecibidaMailable;
use Illuminate\Support\Facades\Mail;
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
    return view('home.home');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/ingreso', [HomeController::class, 'ingreso'])->name('ingreso');

Route::get('/registro', [HomeController::class, 'registro'])->name('registro');

Route::post('/registro/store', [HomeController::class, 'store'])->name('registro.store');

Route::post('/ingreso', [HomeController::class, 'login']);


Route::get('transaccionRecibida', function(){
  

    return "mensaje enviado";
} );