<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="rolName_lbl" class="col-sm-3 control-label label-form">{{ $errors->has('name') ? '* ' : '' }}@lang('message.rolname'):</label>
    <div class="col-sm-9">
        {!!Form::text('name', $role ? $role->name : null,['class'=>'form-control input-form', 'required','placeholder' => 'Ej: administrador'])!!}
    </div>
</div>
<div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
    <label for="displayName_lbl" class="col-sm-3 control-label label-form">{{ $errors->has('display_name') ? '* ' : '' }}@lang('message.displayname'):</label>
    <div class="col-sm-9">
        {!!Form::text('display_name', $role ? $role->display_name : null,['class'=>'form-control input-form', 'required','placeholder' => 'Ej: Administrador'])!!}
    </div>
</div>
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="displayName_lbl" class="col-sm-3 control-label label-form">{{ $errors->has('description') ? '* ' : '' }}@lang('message.description'):</label>
    <div class="col-sm-9">
        {!!Form::text('description', $role ? $role->description : null,['class'=>'form-control input-form','placeholder' => 'Ej: Administrador del sistema'])!!}
    </div>
</div>
