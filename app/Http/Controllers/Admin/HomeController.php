<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaccion;

use App\Models\User;
use App\Models\Cuenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use DataTables;
use Auth;
class HomeController extends Controller
{

 
    public function index(Request $request){


        $consulta= Transaccion::where('status','pendiente')->get();

        $transacciones = $consulta->sortByDesc('created_at');
         ///datables
         if ($request->ajax()) {
            $data = Transaccion::with( 'user'  )->select('*')->where('status', 'pendiente');
            $status="";
           
             
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                    <a href="#" id="edit" cuenta_id="'.$row->cuenta_id.'" value="'. Storage::url($row->boleta).'" ruta="'.route('admin.transacciones.update',$row->id).'"  class="edit btn btn-primary btn-sm title="Boleta">
                    <i class="fa fa-pencil"></i>
                    </a>
                    ';
                    return $actionBtn;
                })
                
                ->editColumn('created_at', function ($data) {
                    return $data->updated_at->format('d/m/Y');
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(updated_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
                })

                ->editColumn('operacion', function ($data) {
                    if($data->operacion =='deposito'){
                        return '<small class="text-success mr-1"><i class="fas fa-arrow-up"></i>Deposito</small>';
                    }else{
                        return 'small class="text-danger mr-1"><i class="fas fa-arrow-down"></i>Retiro</small>';
                    }
                   
                })
                ->editColumn('status', function ($data) {
                   
                    if($data->status =='pendiente'){
                        return '<span class="badge badge-warning">Pendiente</span>';
                    }elseif ($data->status =='pendiente') {
                        return '<span class="badge badge-success">Aprobado</span>';
                    }else{
                        return '<span class="badge badge-danger">Rechazado</span>';
                    }

                   
                })
                ->rawColumns(['status','operacion','action'])
                ->make(true);
        }

        //datables
    
         
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

     
    }

    public function login(Request $request){



        $remember=  $request->filled('remember');
        $credenciales = $request->validate([
         
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        //$credenciales = $request->only('email', 'password') ;
        $request->session()->regenerate();
       if( Auth::attempt($credenciales,$remember) ){
           return redirect('/admin');
       }  
       return redirect()->intended('ingreso')->with('info','usuario o contraseña no coinciden');
    }

   
}
