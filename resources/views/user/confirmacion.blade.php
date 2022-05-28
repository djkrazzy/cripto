@extends('adminlte::page')

@section('title', 'Configuración')

@section('content_header')
    <h1>Confirmación de la cuenta {{ $user->referencia->photo_dpi_front}}</h1>
@stop

@section('content')
   

 <div class="card">
    {!! Form::open(['route' => 'referencias.emergencia', 'autocomplete'=> 'off']) !!}
        <div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">Contacto de emergencia</label>
        <input type="text" name="name_emergency"  class="form-control" id="exampleInputEmail1"
        @if ( $user->referencia->name_emergency )
            value="   {{$user->referencia->name_emergency}}"
           @else  placeholder="A quien llamar en caso de emergencia" @endif  >
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Teléfono de contacto de emergencia</label>
        <input name="tel_emergency" class="form-control" id="exampleInputPassword1"
        @if ( $user->referencia->tel_emergency )
        value="   {{$user->referencia->tel_emergency}}"
       @else  placeholder="Numero de teléfono" @endif >
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            {!! Form::close() !!}
        <!--  fotos de identificacion -->

             
      
        <hr>
        {!! Form::open(['route' => 'referencias.store', 'autocomplete'=> 'off','files'=> true ]) !!}
        {!! Form::hidden('nombre_archivo' , 'photo_dpi_front') !!}
         <div class="row">
             <div class="col-xl-6 col-md-5 col-sm-4">
            <img id="foto_id_atras" class="img-fluid pad" @if ($user->referencia->photo_dpi_front)
            src="   {{asset("images/dpi/".$user->referencia->photo_dpi_front )}}"
           @else src="{{asset("images/muestras/frente_id.png" )}}" @endif alt="" class="">
             </div>
             <div class="col-xl-6 col-md-5 col-sm-4">
                 <div class="form-group">
                     <label for="exampleInputFile">Subir Imagen de parte de Enfrente de identificacion</label>
                     <div class="input-group">
                     <div class="custom-file">
                     <input id="file_frente_dpi" type="file" class="custom-file-input" name="file" accept="image/*"  required>
                     <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                    
                     </div>
                     <button type="submit" class="btn bg-success">Enviar</button>
                     </div>
                     </div>   
             </div>
             @error('file')
             <small class="text-danger">  {{ $message}} </small>
             @enderror
         </div>
 
         {!! Form::close() !!}
       <hr>
       {!! Form::open(['route' => 'referencias.store', 'autocomplete'=> 'off','files'=> true ]) !!}
       {!! Form::hidden('nombre_archivo' , 'photo_dpi_back') !!}
        <div class="row">
            <div class="col-xl-6 col-md-5 col-sm-4">
         
           <img id="foto_id_atras" class="img-fluid pad" @if ($user->referencia->photo_dpi_back)
            src="   {{asset("images/dpi/".$user->referencia->photo_dpi_back )}}"
           @else src="{{asset("images/muestras/atras_id.png" )}}" @endif alt="" class="">
        </div>
            <div class="col-xl-6 col-md-5 col-sm-4">
                <div class="form-group">
                    <label for="exampleInputFile">Subir Imagen de parte de atras de identificacion</label>
                    <div class="input-group">
                    <div class="custom-file">
                    <input id="file_atras_dpi" type="file" class="custom-file-input" name="file" accept="image/*"  required>
                    <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                   
                    </div>
                    <button type="submit" class="btn bg-success">Enviar</button>
                    </div>
                    </div>   
            </div>
            @error('file')
            <small class="text-danger">  {{ $message}} </small>
            @enderror
        </div>

        {!! Form::close() !!}
        
        <hr>
        {!! Form::open(['route' => 'referencias.store', 'autocomplete'=> 'off','files'=> true ]) !!}
        {!! Form::hidden('nombre_archivo' , 'photo_selfie') !!}
         <div class="row">
             <div class="col-xl-6 col-md-5 col-sm-4">
           
            <img id="foto_id_atras" class="img-fluid pad" @if ($user->referencia->photo_selfie)
            src="   {{asset("images/dpi/".$user->referencia->photo_selfie)}}"
           @else src="{{asset("images/muestras/selfie.png" )}}" @endif alt="" class="">
        </div>
             <div class="col-xl-6 col-md-5 col-sm-4">
                 <div class="form-group">
                     <label for="exampleInputFile">Subir fotografía del rostro</label>
                     <div class="input-group">
                     <div class="custom-file">
                     <input id="file_selfie" type="file" class="custom-file-input" name="file" accept="image/*"  required>
                     <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                    
                     </div>
                     <button type="submit" class="btn bg-success">Enviar</button>
                     </div>
                     </div>   
             </div>
             @error('file')
             <small class="text-danger">  {{ $message}} </small>
             @enderror
         </div>
 
         {!! Form::close() !!}
        <hr>
        <!-- fon de fotos identificacion-->
        <hr>
        {!! Form::open(['route' => 'referencias.store', 'autocomplete'=> 'off','files'=> true ]) !!}
        {!! Form::hidden('nombre_archivo' , 'photo_recibo') !!}
         <div class="row">
             <div class="col-xl-6 col-md-5 col-sm-4">
            <img id="foto_id_atras" class="img-fluid pad" @if ($user->referencia->photo_recibo)
            src="   {{asset("images/dpi/".$user->referencia->photo_recibo)}}"
           @else src="{{asset("images/muestras/bill.png" )}}" @endif alt="" class="">     
        </div>
             <div class="col-xl-6 col-md-5 col-sm-4">
                 <div class="form-group">
                     <label for="exampleInputFile">Subir fotografía recibo de luz o telefono</label>
                     <div class="input-group">
                     <div class="custom-file">
                     <input id="file_recibo" type="file" class="custom-file-input" name="file" accept="image/*"  required>
                     <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                    
                     </div>
                     <button type="submit" class="btn bg-success">Enviar</button>
                     </div>
                     </div>   
             </div>
             @error('file')
             <small class="text-danger">  {{ $message}} </small>
             @enderror
         </div>
 
         {!! Form::close() !!}
        <hr>

    
        </div>
        
     
 </div>
   



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop