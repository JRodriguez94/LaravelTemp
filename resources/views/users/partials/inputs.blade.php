<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    {!! Form::label('username', 'Nombre :', ['class' => 'col-sm-3 control-label label-form label-form']) !!}
    <div class="col-sm-9">
        {!! Form::text('username', null, ['class' => 'form-control input-form input-form', 'required' => 'required','placeholder' => 'Ej: Juan José']) !!}
        <small class="text-danger">{{ $errors->first('username') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    {!! Form::label('last_name', 'Apellido paterno: ', ['class' => 'col-sm-3 control-label label-form']) !!}
    <div class="col-sm-9">
        {!! Form::text('last_name', null, ['class' => 'form-control input-form', 'required' => 'required','placeholder' => 'Ej: Peréz']) !!}
        <small class="text-danger">{{ $errors->first('last_name') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('second_last_name') ? ' has-error' : '' }}">
    {!! Form::label('second_last_name', 'Apellido materno: ', ['class' => 'col-sm-3 control-label label-form']) !!}
    <div class="col-sm-9">
        {!! Form::text('second_last_name', null, ['class' => 'form-control input-form', 'required' => 'required','placeholder' => 'Ej: Ortiz']) !!}
        <small class="text-danger">{{ $errors->first('second_last_name') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
    {!! Form::label('direccion', 'Direccion: ', ['class' => 'col-sm-3 control-label label-form']) !!}
</div>
<div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
    {!! Form::label('street', 'Calle: ', ['class' => 'col-sm-3 control-label label-form']) !!}
    <div class="col-sm-9">
        {!! Form::text('street', null, ['class' => 'form-control input-form', 'required' => 'required','maxlength' => '100','placeholder' => 'Calle lomas del 4']) !!}
        <small class="text-danger">{{ $errors->first('street') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('outside_number') ? ' has-error' : '' }}">
    <div class="col-sm-6">
        {!! Form::label('outside_number', 'Número exterior: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('outside_number', null, ['class' => 'form-control input-form','placeholder' => 'Ej: 130', 'required' => 'required','onkeypress' => 'return justNumbers(event)']) !!}
        </div>
    </div>
    <small class="text-danger">{{ $errors->first('outside_number') }}</small>
    <div class="col-sm-6">
        {!! Form::label('interior_number', 'Número interior: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('interior_number', null, ['class' => 'form-control input-form','placeholder' => 'Ej: 10-A']) !!}
        </div>
        <small class="text-danger">{{ $errors->first('interior_number') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('neighborhood') ? ' has-error' : '' }}">
    {!! Form::label('neighborhood', 'Colonia: ', ['class' => 'col-sm-3 control-label label-form']) !!}
    <div class="col-sm-9">
        {!! Form::text('neighborhood', null, ['class' => 'form-control input-form','placeholder' => 'Ej: Chapalita', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('neighborhood') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
    <div class="col-sm-6">
        {!! Form::label('postal_code', 'Código Postal: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('postal_code', null, ['class' => 'form-control input-form','onkeypress' => 'return justNumbers(event)','maxlength' => 5,'placeholder' => 'Ej: 45130', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('postal_code') }}</small>
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <div class="col-sm-6">
        {!! Form::label('city', 'Ciudad: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('city', null, ['class' => 'form-control input-form','placeholder' => 'Ej: Guadalajara', 'required' => 'required']) !!}
        </div>
    </div>
    <small class="text-danger">{{ $errors->first('city') }}</small>
    <div class="col-sm-6">
        {!! Form::label('state', 'Estado: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('state', null, ['class' => 'form-control input-form','placeholder' => 'Ej: Jalisco', 'required' => 'required']) !!}
        </div>
        <small class="text-danger">{{ $errors->first('state') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
    <div class="col-sm-6">
        {!! Form::label('phonenumber', 'Télefono: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('phonenumber', null, ['class' => 'form-control input-form', 'placeholder' => 'Campo Requerido','onkeypress' => 'return justNumbers(event)']) !!}
        </div>
    </div>
    <small class="text-danger">{{ $errors->first('phonenumber') }}</small>
    <div class="col-sm-6">
        {!! Form::label('cellphone', 'Célular: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('cellphone', null, ['class' => 'form-control input-form','placeholder' => 'Ej: 3322114433', 'required' => 'required','onkeypress' => 'return justNumbers(event)']) !!}
        </div>
        <small class="text-danger">{{ $errors->first('cellphone') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('base_salary') ? ' has-error' : '' }}">
    <div class="col-sm-6">
        {!! Form::label('base_salary', 'Sueldo base: ', ['class' => 'col-sm-6 control-label label-form']) !!}
        <div class="col-sm-6">
            {!! Form::text('base_salary', null, ['class' => 'form-control input-form','onkeypress' => 'return justNumbers(event)','placeholder' => 'Ej: 200.30', 'required' => 'required']) !!}
        </div>
    </div>
    <small class="text-danger">{{ $errors->first('base_salary') }}</small>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo: ', ['class' =>'col-sm-3 control-label label-form']) !!}
    <div class="col-sm-9">
        {!! Form::email('email', null, ['class' => 'form-control input-form', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>
</div>
<div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
    {!! Form::label('rol', 'Rol: ', ['class' => 'col-sm-3 control-label label-form']) !!}
    <div class="col-sm-9">
        @if(isset($user->roles[0]))
            {!! Form::select('rol', $roles, $user->roles[0]->id, ['class' => 'form-control input-form', 'required' => 'required']) !!}
        @else
            {!! Form::select('rol', $roles, null, ['class' => 'form-control input-form', 'required' => 'required']) !!}
        @endif
        <small class="text-danger">{{ $errors->first('rol') }}</small>
    </div>
</div>


@push('scripts')
    <script>

        function justNumbers(e)
        {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;
            return /\d/.test(String.fromCharCode(keynum));
        }
    </script>
@endpush
