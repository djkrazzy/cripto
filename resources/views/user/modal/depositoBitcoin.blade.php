<!--           modal      deposito           bitcoin     -->
<div class="modal fade" id="modal-deposito-bitcoin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Depositar fondos con bitcoin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                
                    {!! Form::open(['route' => 'retirarDeposito', 'autocomplete'=> 'off', ]) !!}

                        {!! Form::hidden('user_id' , auth()->user()->id) !!}

                        {!! Form::hidden('cuenta_id' , $user->cuenta->id) !!}
                        
                        
                        {!! Form::hidden('operacion' , 'deposito') !!}
                        {!! Form::hidden('tipo' , 'bitcoin') !!}

                        {!! Form::hidden('status' , 'pendiente')!!}
                        {!! Form::hidden('numero' , '')!!}
                    <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Monto $USD</label>
                    <input type="number"  step="0.1" class="form-control" id="monto_bitcoin" name="monto" required> 
                    </div>
            
                   
                   <hr>
                   <div class="row">
                      <div class="col-xl-6 col-md-5 col-sm-4">
                          <img src="https://upload.wikimedia.org/wikipedia/commons/d/d7/Commons_QR_code.png" alt="" class="img-fluid pad">
                      </div>
                      <div class="col-xl-6 col-md-5 col-sm-4">
                               <label for="">Escanne el qr con el celular para hacer la transación, luego guarde el monto en el historial</label>
                      </div>
                   </div>
                  
                    
                   
            
            
                
                    </div>
                    
                    <div class="card-footer">
                    <button type="submit" class="btn bg-primary">Guardar</button>
                    </div>
                    {!! Form::close() !!}

                

            </div>
            <div class="modal-footer justify-content-between">
              
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>

</div>
<!--     fin      modal      deposito                -->