@extends('adminlte::page')

@section('title', 'Configuración')

@section('content_header')
    <h1>Información de la cuenta</h1>
@stop

@section('content')
   
<div class="card">
    {!! Form::model($user,['route' => 'cuenta.update', 'autocomplete'=> 'off']) !!}
        <div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1"># de cuenta bancaria</label>
      

       {!! Form::text('numero_cuenta_banco', $user->referencia->numero_cuenta_banco, ['class' => 'form-control','placeholder' => 'Numero de cuenta para recibir depositos'])  !!}
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">El nombre del banco</label>
          
          
             {!! Form::text('banco', $user->referencia->banco, ['class' => 'form-control','placeholder' => 'Nombre del banco para recibir transacciones'])  !!}
               
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Sleccione Tipo de Cuenta</label>
                {!! Form::select('tipo_cuenta', ['Ninguno' => 'Ninguno',
                 'Monetaria' => 'Monetaria',
                 'Ahorro' => 'Ahorro'
                ],
                $user->referencia->tipo_cuenta, ['class' => 'form-control']);  !!}
                   
                </div>
       <hr>
        <div class="form-group">
        <label for="exampleInputPassword1">E-wallet de BTC</label>
      
       {!! Form::text('bitcoin', $user->referencia->bitcoin, ['class' => 'form-control','placeholder' => 'Ewalet para recibir transacciones'])  !!}
        </div>
        
       


    
        </div>
        
        <div class="card-footer">
        <button type="submit" class="btn bg-primary">Guardar Cambios</button>
        </div>
        {!! Form::close() !!}
 </div>

   



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop