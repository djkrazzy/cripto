@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Transacciones</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    @if (session('info'))
    <div class="alert alert-success">
             <strong class="">{{session('info')}}</strong>
    </div>
@endif

    <div class="card">
<div class="card-header">
<h3 class="card-title">DataTable with default features</h3>
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
    @foreach($transacciones as $transaccion)
    <tr>
    @if($transaccion->operacion =='deposito')
    <td><small class="text-success mr-1"><i class="fas fa-arrow-up"></i>Deposito</small>
      <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-actualizar{{$transaccion->id }}" ">Aprobar</button>
      <!--           modal      actualizar                -->
      <div class="modal fade" id="modal-actualizar{{$transaccion->id}}">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
         <div class="modal-header bg-warning">
        <h4 class="modal-title">Aprovar ransacción</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
      <div class="modal-body">
      <p>esta seguro de aprobar la transacción?&hellip;</p>
      <form action="{{ route('admin.transacciones.update',$transaccion->id)}}" id="form-actualizar" method="POST">
    
    @csrf
    {{ method_field('PUT') }}
      <input type="hidden"  name="status" value="aprobado"  >
      <input type="hidden"  name="cuenta_id" value="{{$transaccion->cuenta_id}}"  >
     
      <div class="card">
        <button type="submit" class="btn bg-success ">Enviar</button>
        </div>
      </form>
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn bg-danger" data-dismiss="modal">Cerrar</button>
    
    </div>
    </div>
    
    </div>
    
    </div>
      <!--     fin      modal      actualizar                --></td>
@else
<td><small class="text-danger mr-1"><i class="fas fa-arrow-down"></i>Retiro</small></td>
@endif
<td>{{$transaccion->monto }}</td>
<td>{{$transaccion->numero }}</td>
<td> <button class="btn btn-primary" >Boleta</button> </td>
<td>{{$transaccion->user->name }}</td>
<td>{{$transaccion->created_at }}</td>

@if($transaccion->status =='pendiente')
<td> 
 
 
</td>
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


<!--           modal      actualizar                -->
<div class="modal fade" id="modal-actualizar">
  <div class="modal-dialog modal-sm">
  <div class="modal-content">
   <div class="modal-header bg-warning">
  <h4 class="modal-title">Aprobar Transaccion</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <p>esta seguro de aprobar la transacción?&hellip;</p>
  <form action="{{ route('admin.transacciones.update','3') }}" id="form-actualizar" method="POST">

@csrf
{{ method_field('PUT') }}
  <input type="hidden"  name="status" value="aprobado"  >

 
  <div class="card">
    <button type="submit" class="btn bg-success">Enviar</button>
    </div>
  </form>
  </div>
  <div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
 
  </div>
  </div>
  
  </div>
  
  </div>
  <!--     fin      modal      actualizar                -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        


          <p>esta seguro de aprobar la transacción?&hellip;</p>
          <form action="{{ route('admin.transacciones.update','3') }}" id="form-actualizar" method="POST">
        
        @csrf
        {{ method_field('PUT') }}
          <input type="hidden"  name="status" value="aprobado"  >
          <input type="text" class="form-control" id="recipient-name">
         
          <div class="card">
            <button type="submit" class="btn bg-success">Enviar</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
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
      "buttons": [  'copy', 'csv', 'excel', 'pdf', 'print']
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  });

  function aprobar(id){
    console.log(id); 
    
    $('#modal-actualizar').modal("show");
  ;
    

  }


  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
  $("#form-actualizar").attr("action","{{ route('admin.transacciones.update', "+recipient+") }}");
})
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