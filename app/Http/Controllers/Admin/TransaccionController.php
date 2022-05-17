<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use Illuminate\Http\Request;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transacciones= Transaccion::get();
        return view('admin.transacciones.index',compact('transacciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transacciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaccion $transaccion)
    {
        return view('admin.transacciones.show', compact('transaccion')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaccion $transaccion)
    {
        return view('admin.transacciones.edit', compact('transaccion')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Transaccion $transaccione,Request $request )
    {
        ///validar transaccion

        $cuenta= Cuenta::find($request->cuenta_id);


          $transaccione->status =  $request->status;
          $transaccione->save() ;
           
          $nuevo_saldo= $cuenta->saldo+$transaccione->monto;

          $cuenta->saldo= $nuevo_saldo;
          $cuenta->save() ;
         
        return redirect('/admin')->with('info', 'El estado cambio con exito') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaccion $transaccion)
    {
        //
    }
}
