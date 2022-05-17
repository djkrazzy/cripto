<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaccion;

use App\Models\User;
use App\Models\Cuenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Auth;
class HomeController extends Controller
{

 
    public function index(){


        $consulta= Transaccion::where('status','pendiente')->get();

        $transacciones = $consulta->sortByDesc('created_at');
    
        return view('admin.index',compact('transacciones') );
    }

    public function ingreso(){
        return view('home.login');
    }

    public function registro(){
        return view('home.registro');
    }

    public function store(Request $request){

       

         // 'monto'=>'required|unique::categorie'
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required', 'string',
        ]);
       // return  Storage::put('public/boletas',$request->file('file'));
     $user=  User::create([
        'name' =>  $request->name,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'status' => $request->status,
        'password' => Hash::make($request->password),

     ]);
       
     Cuenta::create([
        'name' =>  Hash::make($user->id),
        'user_id' => $user->id,
        'saldo' => '0',
  

     ]);

     $credenciales = request()->only('email', 'password') ;
     request()->session()->regenerate();
   if( Auth::attempt($credenciales) ){
       return redirect()->route('user.usertransacciones.index')->with('info', 'Cuenta creada con');;
   }  
   return redirect('ingreso');
       
        ///Mail::to(Auth::user()->email)->send($recibida) ;

      // return redirect()->route('user.usertransacciones.index')->with('info', 'Informacion enviada con éxito');
    }
}
