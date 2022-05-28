<?php
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Mail\TransaccionRecibidaMailable;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\ReferenciasController;
use App\Http\Controllers\CuentaController;
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
    Route::get('/admin', function () {
        return view('admin.user.index');
    })->name('dashboard');
});

Route::get('/tranacciones', [HomeController::class, 'index'])->name('transaccion.index');
Route::get('/ingreso', [HomeController::class, 'ingreso'])->name('ingreso');
Route::post('/ingreso', [HomeController::class, 'login']);

Route::get('/registro', [HomeController::class, 'registro'])->name('registro');

Route::post('/registro/store', [HomeController::class, 'store'])->name('registro.store');


///paginas de usuario

Route::get('/user/configuracion', [PageController::class, 'configuracion'])->name('user.configuracion');

Route::get('/user/confirmacion', [PageController::class, 'confirmacion'])->name('user.confirmacion');
Route::get('/user/cuenta', [PageController::class, 'cuenta'])->name('user.cuenta');
Route::get('/notificationes', [TransaccionesController::class, 'getNotificationsData'])->name('notificationes');


Route::get('transaccionRecibida', function(){
  

    return "mensaje enviado";
} );


//enviar documentos

Route::post('/referencias/store', [ReferenciasController::class, 'store'])->name('referencias.store');
Route::post('/referencias/emergencia', [ReferenciasController::class, 'emergencia'])->name('referencias.emergencia');

///datos bancarios de cuenta
Route::post('/cuenta/update', [CuentaController::class, 'update'])->name('cuenta.update');