@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mi cuenta</h1>
@stop

@section('content')
    <p>Bienvenido al paneld e admnitración de su cuenta.</p>

@if (session('info'))
 

    <div class="alert alert-success">
             <strong class="">{{session('info')}}</strong>
    </div>
@endif

    <section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->profile_photo_url }}" alt=" {{ Auth::user()->name }} " alt="User profile picture">
</div>
<h3 class="profile-username text-center"> {{ Auth::user()->name }}</h3>
<p class="text-muted text-center">{{ Auth::user()->email }} </p>


<div class="form-group">
    <h3>Generar una trasacción</h3>
<label>Seleccion Tipo de Transacción</label>
<select id="tipo" class="form-control select2" style="width: 100%;">
<option value="deposito"selected="selected">Deposito Bancario</option>
<option value="bitcoin">Bitcoin</option>

</select>
</div>





@error('monto')
        <small class="text-danger">  {{ $message}} </small>
    @enderror

<a href="#" class="btn  btn-block btn-outline-success " onclick="modal('{{ Auth::user()->id }}')"><i class="fas fa-arrow-up"></i> <b>DEPOSITAR</b></a>
<a href="#" class="btn btn-outline-danger btn-block " onclick="modal_retiro('{{ Auth::user()->id }}')"><i class="fas fa-arrow-down"></i> <b>RETIRAR</b></a>
</div>

</div>




</div>

<div class="col-md-9">
    <div class="card">
    <div class="card-header p-2">
    <h3>Balance cuenta</h3>
    </div>
        <div class="card-body">

            <div class="post">
                <div class="card-footer">
                <div class="row">
                <div class="col-sm-3 col-6">
                
                <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> </span>
                <h5 class="description-header"> {{$totalDepositos}}</h5>
                <span class="description-text">TOTAL DEPOSITOS</span>
                </div>
                </div>
                
                <div class="col-sm-3 col-6">
                <div class="description-block">
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> </span>
                <h5 class="description-header">{{$totalRetiros}}</h5>
                <span class="description-text">TOTAL DE RETIROS</span>
                </div>
                </div>
                
                <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> </span>
                <h5 class="description-header">{{$totalDepositos -$totalRetiros }}   </h5>
                <span class="description-text">SALDO A LA FECHA</span>
                </div>
                
                </div>
                
                <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> </span>
                <h5 class="description-header"> {{ $user->cuenta->saldo }}</h5>
                <span class="description-text">TOTAL PROFIT</span>
                </div>
                
                </div>
                
                
                
                </div>
                
                </div>
                
                
                
                </div>
                
                
                <div class="post clearfix">
                    @if ($errors->any())
                    <p>Hay errores!</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                Calculadora
                
                </div>
        </div>
    </div>

</div>

</div>

</div>
</section>



    <div class="card">
<div class="card-header">
<h3 class="card-title">Registro de transacciones</h3>
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



@include('user.modal.depositoBancario')


@include('user.modal.depositoBitcoin')


@include('user.modal.retiroBanco')

@include('user.modal.retiroBitcoin')



@include('user.modal.boleta')






  



 

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    

    <script type=”module” src="{{ asset('js/clipboard.js') }}" type="text/javascript"></script>
  
    <script>
 


  var table = $('#example1').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
      "responsive": true,
        "lengthChange": false, "autoWidth": false,
        dom: 'Bfrtip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        ajax: "{{ route('user.usertransacciones.index') }}",
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
     
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;








    ///controldor modal


    function modal(id){

           console.log(id);
     tipo = $("#tipo").val();
    
     if (tipo == 'deposito'){
			$('#modal-deposito').modal("show");	
				} else {
				
					$('#modal-deposito-bitcoin').modal("show");	 	
				} 
      }

      function modal_retiro(id){

                console.log(id);
                tipo = $("#tipo").val();

                if (tipo == 'deposito'){
                $('#modal-retiro').modal("show");	
                    } else {
                    
                        $('#modal-retiro-bitcoin').modal("show");	 	
                    } 
                }

        //cambair imagen
        document.getElementById('file').addEventListener('change', cambiarImagen);
           
           function cambiarImagen(event){
              var file = event.target.files[0];

              var reader = new FileReader();
              reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src', event.target.result); 
              };
              reader.readAsDataURL(file);
           }


           ///modal boleta


           $(document).on("click", "#edit", function (e) {
    let idEditar = $(this).attr("value");
    
            $("#boleta").modal("show");//abro el modal
            $("#imagen_boleta").attr("src",idEditar);

       
    
  
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