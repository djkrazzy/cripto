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
  <th>Operación</th>
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
  <th>Operación</th>
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
    <div class="modal fade" id="boleta">
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
    <p>¿esta seguro de aprobar la transacción?&hellip;</p>
    <form action="" id="form-actualizar" method="POST">
  
  @csrf
  {{ method_field('PUT') }}
    <input type="hidden"  name="status" value="aprobado"  >
    <input type="hidden"  name="cuenta_id"  id="cuenta_id" value=""  >
    <input type="hidden"  name="operacion"  id="operacion" value=""  >
    <img id="imagen_boleta" src="{{ Storage::url( '')}}" alt=""  class="img-fluid pad">
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
    <!--     fin      modal      actualizar                -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    
    <script>
  

 
  var table = $('#example1').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
      "responsive": true,
        "lengthChange": false, "autoWidth": false,
        dom: 'Bfrtip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        ajax: "{{ route('transaccion.index') }}",
        columns: [
          {data: 'operacion', name: 'operacion'},
            {data: 'tipo', name: 'tipo'},
            {data: 'monto', name: 'monto'},
            {data: 'numero', name: 'numero'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
            {data: 'user.name', name: 'user.name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'status', name: 'status'},
           
        ]
     
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
///modal boleta


$(document).on("click", "#edit", function (e) {
    let boleta = $(this).attr("value");
    let ruta = $(this).attr("ruta");
    let cuenta_id = $(this).attr("cuenta_id");
    let operacion = $(this).attr("operacion");
    
            $("#boleta").modal("show");//abro el modal
            $("#imagen_boleta").attr("src",boleta);
            $("#form-actualizar").attr("action",ruta);
            $("#cuenta_id").val(cuenta_id);
            $("#operacion").val(operacion);
  
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