<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Storage;
use App\Mail\TransaccionRecibidaMailable;
use Illuminate\Support\Facades\Mail;
use Auth;
class UserTransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transacciones= Transaccion::where('user_id',auth()->user()->id )->get();

        $user= User::find(auth()->user()->id );

        $totalDepositos =  $transacciones->where('user_id', auth()->user()->id )
        ->where('status', 'aprobado')->where('operacion', 'deposito')
        ->sum('monto');

        $totalRetiros =  $transacciones->where('user_id', auth()->user()->id )
        ->where('status', 'aprobado')->where('operacion', 'retiro')
        ->sum('monto');
    

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
       $transacion= Transaccion::create($request->all()) ;
        if($request->file('file')){
            $url= Storage::put('public/boletas',$request->file('file'));
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
        //
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
