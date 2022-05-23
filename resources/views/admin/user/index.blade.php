@extends('adminlte::page')

@section('title', 'Administración de Usuarios')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
<p>Listado y Administración de usuarios.</p>
@if (session('info'))
<div class="alert alert-success">
         <strong class="">{{session('info')}}</strong>
</div>
@endif

<div class="card">
<div class="card-header">
<h3 class="card-title">Administra los usuarios</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Tipo</th>
<th>Monto</th>
<th># Transaccion</th>
<th>Boleta</th>
<th>Usuario</th>
<th>Fecha</th>
<th>Estado</th>
</tr>
</thead>
<tbody>



</tbody>
<tfoot>
<tr>
<th>Tipo</th>
<th>Monto</th>
<th># Transaccion</th>
<th>Boleta</th>
<th>Usuario</th>
<th>Fecha</th>
<th>Estado</th>
</tr>
</tfoot>
</table>
</div>

</div>






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop