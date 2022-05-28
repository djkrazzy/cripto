<?php

namespace App\Http\Controllers;

use App\Models\Referencias;
use App\Http\Requests\StoreReferenciasRequest;
use App\Http\Requests\UpdateReferenciasRequest;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreReferenciasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // return $request->all();
        // 'monto'=>'required|unique::categorie'
        $request->validate([
           
            'file' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);
       // return  Storage::put('public/boletas',$request->file('file'));
        //return $request->file('file');
     
        //return $request->all();
        $real=$request->file->getClientOriginalName();
        $nombre_archivo=$request->nombre_archivo;
        //return $real;
        $referencia= Referencias::where('user_id',auth()->user()->id )->first();
       


        if($request->hasFile('file')){
            
            $imagen        = $request->file("file");
            $random  = Str::random(15);
            $nombreimagen  = $random. Str::slug($request->numero).".".$imagen->guessExtension();
            //$nombreimagen= $imagen->getClientOriginalName();
            $ruta = "images/dpi/".  $nombreimagen ;
            Image::make($imagen->getRealPath())->save($ruta);
            //$model->foto  = $nombreimagen; // asignar el nombre para guardar
            $referencia->$nombre_archivo = $nombreimagen;

            $referencia->save();
           }
           return redirect()->route('user.confirmacion')->with('info', 'Informacion enviada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referencias  $referencias
     * @return \Illuminate\Http\Response
     */
    public function show(Referencias $referencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referencias  $referencias
     * @return \Illuminate\Http\Response
     */
    public function edit(Referencias $referencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReferenciasRequest  $request
     * @param  \App\Models\Referencias  $referencias
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferenciasRequest $request, Referencias $referencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referencias  $referencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referencias $referencias)
    {
        //
    }

    public function emergencia(Request $request)
    {
      
       $referencia= Referencias::where('user_id',auth()->user()->id )->first();

       $referencia->name_emergency= $request->name_emergency;
       $referencia->tel_emergency= $request->tel_emergency;

       $referencia->save();
      
      return redirect()->route('user.confirmacion')->with('info', 'Informacion enviada con éxito');


    }
}
