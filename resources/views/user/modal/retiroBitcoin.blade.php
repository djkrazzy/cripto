<!--           modal      retiro    bitcoin            -->
<div class="modal fade" id="modal-retiro-bitcoin">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header bg-danger">
    <h4 class="modal-title">Retirar fondos por Bitcoin</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'retirarDeposito', 'autocomplete'=> 'off', ]) !!}
    
                {!! Form::hidden('user_id' , auth()->user()->id) !!}
    
                {!! Form::hidden('cuenta_id' , $user->cuenta->id) !!}
                
                
                {!! Form::hidden('operacion' , 'retiro') !!}
                {!! Form::hidden('tipo' , 'bitcoin') !!}
    
                {!! Form::hidden('status' , 'pendiente')!!}
            <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Monto $USD</label>
            <input type="number"  step="0.1" class="form-control" id="monto_bitcoin" name="monto" required> 
            </div>
    
           
            <hr>
                    <div class="form-group">
                    <label for="exampleInputPassword1">E-wallet de BTC</label>
                    <input type="text" class="form-control" id="ewallet" name="ewallet" value=""  >
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
    <!--     fin      modal      retiro     bitcoin           -->
