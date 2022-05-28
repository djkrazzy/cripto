<!--           modal      deposito       bancario         -->
<div class="modal fade" id="modal-deposito">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header bg-success">
    <h4 class="modal-title">Depositar fondos boleta</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    
        {!! Form::open(['route' => 'user.usertransacciones.store', 'autocomplete'=> 'off','files'=> true ]) !!}
    
        {!! Form::hidden('user_id' , auth()->user()->id) !!}
    
        {!! Form::hidden('cuenta_id' , $user->cuenta->id) !!}
        
        
        {!! Form::hidden('operacion' , 'deposito') !!}
        {!! Form::hidden('tipo' , 'deposito') !!}
    
        {!! Form::hidden('status' , 'pendiente')!!}
    
            <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Numero de Boleta</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero')}}" placeholder="ingrese el numero" required>
             @error('numero')
                 <small class="text-danger">  {{ $message}} </small>
             @enderror
        
        </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Monto</label>
            <input type="number"  step="0.1" class="form-control" id="monto" name="monto" required>
            @error('monto')
            <small class="text-danger">  {{ $message}} </small>
        @enderror
            </div>
            
            <div class="row">
                <div class="col-xl-6 col-md-5 col-sm-4">
               <img id="picture" class="img-fluid pad"   src="data:image/jpeg;base64,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" alt="" class="">
                </div>
                <div class="col-xl-6 col-md-5 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputFile">Subir Imagen de la boleta</label>
                        <div class="input-group">
                        <div class="custom-file">
                        <input id="file" type="file" class="custom-file-input" name="file" accept="image/*"  required>
                        <label class="custom-file-label" for="exampleInputFile">Seleccione el arcgivo</label>
                        </div>
                      
                        </div>
                        </div>   
                </div>
            </div>
            
            
            <div class="card-footer">
            <button type="submit" class="btn bg-success">Enviar</button>
            </div>
            {!! Form::close() !!}
           
    
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    
    </div>
    </div>
    
    </div>
    
    </div>
    </div>
    <!--     fin      modal      deposito                -->