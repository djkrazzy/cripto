@extends('adminlte::page')

@section('title', 'Configuración')

@section('content_header')
    <h1>Información de la cuenta</h1>
@stop

@section('content')
   
<div class="card">
    <form>
        <div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1"># de cuenta bancaria</label>
        <input type="text" class="form-control" id="numero_cuenta_banco" name="numero_cuenta_banco" placeholder="numero de cuenta para recibir depositos">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Sleccione Banco</label>
                 <select name="banco" id="banco" class="form-control">
                    <option value="Ninguno">Ninguno</option>
                   <option value="BI">Banco Industrial</option>
                   <option value="Banrural">Banrural</option>
                   <option value="GYT">GYT</option>
                   <option value="BAC">BAC</option>
                   <option value="BAM">BAM</option>

                 </select>
            </div>
       <hr>
        <div class="form-group">
        <label for="exampleInputPassword1">E-wallet de BTC</label>
        <input type="text" class="form-control" id="ewallet" name="ewallet"  placeholder=" Ewalet para recibir transacciones" >
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
    <script> console.log('Hi!'); </script>
@stop