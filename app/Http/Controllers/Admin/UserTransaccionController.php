<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Storage;
use App\Mail\TransaccionRecibidaMailable;
use Illuminate\Support\Facades\Mail;
use DataTables;
use Auth;
class UserTransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transacciones= Transaccion::where('user_id',auth()->user()->id )->get();
// modificar
        $user= User::find(auth()->user()->id );

        $totalDepositos =  $transacciones->where('user_id', auth()->user()->id )
        ->where('status', 'aprobado')->where('operacion', 'deposito')
        ->sum('monto');

        $totalRetiros =  $transacciones->where('user_id', auth()->user()->id )
        ->where('status', 'aprobado')->where('operacion', 'retiro')
        ->sum('monto');

        
        ///datables
        if ($request->ajax()) {
            $data = Transaccion::with( 'user'  )->select('*')->where('user_id', auth()->user()->id);
            $status="";
           
             
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                    <a href="#" id="edit" value="'. Storage::url($row->boleta).'" class="edit btn btn-primary btn-sm title="Boleta">
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

        return view('user.index',compact('transacciones','user','totalDepositos','totalRetiros') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // 'monto'=>'required|unique::categorie'
        $request->validate([
            'monto'=>'required',
            'file' =>'image'
        ]);
       // return  Storage::put('public/boletas',$request->file('file'));
        //return $request->file('file');
        $recibida= new TransaccionRecibidaMailable($request->all());
        //return $request->all();
        $real=$request->file->getClientOriginalName();
       $transacion= Transaccion::create($request->all()) ;
        if($request->file('file')){
           // $url= Storage::put('public/boletas',$request->file('file'));
           $file = $request->file('file');
            $url=Storage::put('public/boletas',$file);

            
            $transacion->boleta = $url;

            $transacion->save();
        }
       
       
        Mail::to(Auth::user()->email)->send($recibida) ;

       return redirect()->route('user.usertransacciones.index')->with('info', 'Informacion enviada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Transaccion::findOrFail($id);
            return response()->json($data);
        }
      return 'show boletas';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
