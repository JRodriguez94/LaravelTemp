@permission('lista_roles')
<a data-toggle="modal" id_role="{{ $role->id }}" data-target="#role_modal" class="btn btn-info get-role"
   data-hover="tooltip" title="Detalles">
    <i class="glyphicon glyphicon-eye-open"></i>
</a>
@endpermission
@permission('editar_rol')
<a href="roles/{{ $role->id }}/edit" class="btn btn-primary" data-toggle="tooltip" title="Editar">
    <i class="glyphicon glyphicon-edit"></i>
</a>
@endpermission
@permission('lista_permisos')
<a data-toggle="modal" id_role="{{ $role->id }}" data-target="#permisos" class="btn btn-primary get-permisos"
   data-hover="tooltip" title="Permisos">
    <i class="glyphicon glyphicon-lock"></i>
</a>
@endpermission
@permission('eliminar_rol')
    @if($role->status)
        <a href="#" class="btn btn-danger cli" data-toggle="tooltip" title="Desactivar" data-role="{{ $role->id }}">
            <i class="fa fa-trash"></i>
        </a>
    @else
        <a href="#" class="btn btn-success cli" data-toggle="tooltip" title="Activar" data-role="{{ $role->id }}">
            <i class="fa fa-plus"></i>
        </a>
    @endif
@endpermission()
