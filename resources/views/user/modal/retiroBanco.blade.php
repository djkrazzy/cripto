<!--           modal      retiro       banco         -->
<div class="modal fade" id="modal-retiro">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header bg-danger">
    <h4 class="modal-title">Retirar fondos por deposito bancario</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'retirarDeposito', 'autocomplete'=> 'off', ]) !!}
    
                {!! Form::hidden('user_id' , auth()->user()->id) !!}
    
                {!! Form::hidden('cuenta_id' , $user->cuenta->id) !!}
                
                
                {!! Form::hidden('operacion' , 'retiro') !!}
                {!! Form::hidden('tipo' , 'deposito') !!}
    
                {!! Form::hidden('status' , 'pendiente')!!}
            <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Monto $USD</label>
            <input type="number"  step="0.1" class="form-control" id="monto_boleta" name="monto" required> 
            </div>
    
           
           <hr>
           <div class="form-group">
            <label for="exampleInputPassword1"># de Cuenta</label>
            <input type="text" class="form-control" id="numero_cuenta" name="numero" value=""  >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"># Banco</label>
                <input type="text" class="form-control" id="bamco_retiro" name="banco" value="" >
                </div>
            </div>
            
            <div class="card-footer">
            <button type="submit" class="btn bg-primary">Enviar</button>
            </div>
            {!! Form::close() !!}
                
            </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    
    </div>
    </div>
    
    </div>
    
    </div>
    <!--     fin      modal      retiro                -->
    