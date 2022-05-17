@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Transacciones</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>


    <div class="card">
<div class="card-header">
<h3 class="card-title">DataTable with default features</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Operacion</th>
<th>Monto</th>
<th># Transaccion</th>
<th>Boleta</th>
<th>Usuario</th>
<th>Fecha</th>
<th>Estado</th>
</tr>
</thead>
<tbody>
    @foreach($transacciones as $transaccion)
    <tr>
    @if($transaccion->operacion =='deposito')
    <td><small class="text-success mr-1"><i class="fas fa-arrow-up"></i>Deposito</small></td>
@else
<td><small class="text-danger mr-1"><i class="fas fa-arrow-down"></i>Retiro</small></td>
@endif
<td>{{$transaccion->monto }}</td>
<td>{{$transaccion->numero }}</td>
<td> <button class="btn btn-primary">Boleta</button></td>
<td>{{$transaccion->user->name }}</td>
<td>{{$transaccion->created_at }}</td>

@if($transaccion->status =='pendiente')
<td> <span class="badge badge-warning">Pendiente</span></td>
@elseif($transaccion->status =='aprobado')
<td>  <span class="badge badge-success">Aprobado</span></td>
@else
<td> <span class="badge badge-danger">Rechazado</span></td>
@endif


</tr>

    @endforeach


</tbody>
<tfoot>
<tr>
<th>Operación</th>
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
    <script> console.log('Hi!'); </script>
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@if (session('info'))
  <script>
      Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Operacion exitosa',
  showConfirmButton: false,
  timer: 3000
});


  </script>
  
@endif
@stop