@extends('layouts.home')

@section('content')


			<section class="login bluish-purple relative overflow-h ptb-100">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="user-table">
								<div class="section-heading text-center">
									<h2 class="title">RGISTRO DE USUARIO</h2>
								</div>
								<form class="login-form"  method='POST' action="{{ route('registro.store')}}">
                                 @csrf
                                 <div class="form-group">
                                    <label class="form-label">Nombre</label>
                                    <input name="name" type="text" class="form-control" placeholder="Nombre y Apellidos" required="">
									@error('name')
									<small class="text-danger">  {{ $message}} </small>
								@enderror
								</div>
									<div class="form-group">
										<label class="form-label">Correo</label>
										<input name="email" type="email" class="form-control" placeholder="ejemplo@dominio.com" required="">
										@error('email')
										<small class="text-danger">  {{ $message}} </small>
									@enderror
									</div>
									<div class="form-group">
										<label class="form-label">Contraseña</label>
										<input name='password' type="password" class="form-control" placeholder="Enter your Password" required="">
										@error('password')
										<small class="text-danger">  {{ $message}} </small>
									@enderror
									</div>
                                    <div class="form-group">
										<label class="form-label">Numero deTelefono</label>
										<input name="telefono" id="telefono" class="form-control" placeholder="55555555" required="">
									    @error('telefono')
                                      <small class="text-danger">  {{ $message}} </small>
                                       @enderror
									</div>
									<div class="login-btn-g">
										<div class="row">
										
									        <div class="col-5 d-flex flex-center justify-right">
									            <button name="submit" type="submit" class="button">Registrarme</button>
									        </div>
									    </div>
							        </div>
							       
							      
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>






            

@endsection


@section('js')
<script>
    
    
  
   
  


    var input = document.querySelector("#telefono");
window.intlTelInput(input, {
	initialCountry: "gt",
    autoHideDialCode:false,
    nationalMode: false,

  //  preferredCountries: ['pe'],
    utilsScript: "{{ asset('js/utils.js') }}",
});
  
   



  </script>


@endsection

