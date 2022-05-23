@extends('adminlte::page')

@section('title', 'Configuración')

@section('content_header')
    <h1>Confirmación de la cuenta</h1>
@stop

@section('content')
   

 <div class="card">
    <form>
        <div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">Contacto de emergencia</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="a quien llamar en caso de emergencia">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Teléfono de contacto de emergencia</label>
        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Numero de teléfono">
        </div>
        
        <!--  fotos de identificacion -->

             
        <div class="row">
            <div class="col-xl-6 col-md-5 col-sm-4">
           <img id="foto_id" class="img-fluid pad"   src="{{asset("images/muestras/frente_id.png" )}}" alt="" class="">
            </div>
            <div class="col-xl-6 col-md-5 col-sm-4">
                <div class="form-group">
                    <label for="exampleInputFile">Subir Imagen de parte frontal de identificacion</label>
                    <div class="input-group">
                    <div class="custom-file">
                    <input id="file_frente_dpi" type="file" class="custom-file-input" name="file_frente_dpi" accept="image/*"  required>
                    <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                    </div>
                  
                    </div>
                    </div>   
            </div>
        </div>
       <hr>
        <div class="row">
            <div class="col-xl-6 col-md-5 col-sm-4">
           <img id="foto_id_atras" class="img-fluid pad"   src="{{asset("images/muestras/atras_id.png" )}}" alt="" class="">
            </div>
            <div class="col-xl-6 col-md-5 col-sm-4">
                <div class="form-group">
                    <label for="exampleInputFile">Subir Imagen de parte de atras de identificacion</label>
                    <div class="input-group">
                    <div class="custom-file">
                    <input id="file_atras_dpi" type="file" class="custom-file-input" name="file_atras_dpi" accept="image/*"  required>
                    <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                    </div>
                  
                    </div>
                    </div>   
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xl-6 col-md-5 col-sm-4">
           <img id="foto_selfie" class="img-fluid pad"   src="{{asset("images/muestras/selfie.png" )}}" alt="" class="">
            </div>
            <div class="col-xl-6 col-md-5 col-sm-4">
                <div class="form-group">
                    <label for="exampleInputFile">Subir Ifotografía del rostro</label>
                    <div class="input-group">
                    <div class="custom-file">
                    <input id="file_selfie" type="file" class="custom-file-input" name="file_selfie" accept="image/*"  required>
                    <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                    </div>
                  
                    </div>
                    </div>   
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xl-6 col-md-5 col-sm-4">
           <img id="foto_bill" class="img-fluid pad"   src="{{asset("images/muestras/bill.png" )}}" alt="" class="">
            </div>
            <div class="col-xl-6 col-md-5 col-sm-4">
                <div class="form-group">
                    <label for="exampleInputFile">Subir Imagen de Recibo de agua o lúz</label>
                    <div class="input-group">
                    <div class="custom-file">
                    <input id="file_bill" type="file" class="custom-file-input" name="file_bill" accept="image/*"  required>
                    <label class="custom-file-label" for="exampleInputFile">Seleccione el archivo</label>
                    </div>
                  
                    </div>
                    </div>   
            </div>
        </div>
        <hr>
        <!-- fon de fotos identificacion-->


    
        </div>
        
        <div class="card-footer">
        <button type="submit" class="btn bg-primary">Guardar Cambios</button>
        </div>
     </form>
 </div>
   



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop