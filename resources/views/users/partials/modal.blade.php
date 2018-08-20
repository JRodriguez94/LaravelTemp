<div class="modal fade" id="user_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title" style="background-color:#3c8dbc">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <font color="white"><h4>Detalles del usuario</h4></font>
            </div>
            <div class="modal-body">
                <div class="row" id="etq">
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Rol:</small></strong>
                        {!! Form::text('rol', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Nombre | Apellido Materno | Apellido Paterno:</small></strong>
                        {!! Form::text('username', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal"><strong>Domicilio:</strong></small></strong>
                    </div>
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Calle | Número ext | Número int | Colonia | Código Postal:</small></strong>
                        {!! Form::text('street', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Ciudad | Estado:</small></strong>
                        {!! Form::text('city', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <strong><small class="lbl_modal">Télefono:</small></strong>
                            {!! Form::text('phonenumber', null, ['class'=>'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <strong><small class="lbl_modal">Celular:</small></strong>
                            {!! Form::text('cellphone', null, ['class'=>'form-control', 'readonly']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <strong><small class="lbl_modal">Sueldo Base:</small></strong>
                            {!! Form::text('base_salary', null, ['class'=>'form-control', 'readonly']) !!}
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Correo:</small></strong>
                        {!! Form::text('email', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <strong><small class="lbl_modal">Estatus:</small></strong>
                        {!! Form::text('status', null, ['class'=>'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
