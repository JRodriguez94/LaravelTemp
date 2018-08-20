<div class="modal fade" id="role_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title" style="background-color:#3c8dbc">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <font color="white"><h4 class="modal-title" id="modalTitle">Registrar bloqueo</h4></font>
            </div>
            <div class="modal-body">
                <div class="row" id="etq">
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Nombre de rol:</small></strong>
                        {!! Form::text('name', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Descripción:</small></strong>
                        {!! Form::text('description', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
