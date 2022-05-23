@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Configuración global de la pagina</h1>
@stop

@section('content')
<div class="card">
    <form>
        <div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1"># de cuenta bancaria</label>
        <input type="text" class="form-control" id="numero_cuenta_banco" name="numero_cuenta_banco" placeholder="numero de cuenta para recibir depositos" value="{{config('app.cuenta_banco')}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Banco</label>
            <input type="text" class="form-control" id="banco" name="banco" placeholder="numero de cuenta para recibir depositos">
            </div>
       <hr>
        <div class="form-group">
        <label for="exampleInputPassword1">E-wallet de BTC</label>
        <input type="text" class="form-control" id="ewallet" name="ewallet"  placeholder=" Ewalet para recibir transacciones" >
        </div>
        
        <div class="row">
            <div class="col">
               
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contenido del frente de la pagina</label>
                            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                        </div>
                    </form>
             
            </div>
        </div>
       


    
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>



<script type="text/javascript">
    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@stop