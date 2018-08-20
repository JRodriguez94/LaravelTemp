@permission('lista_usuarios')
<a data-toggle="modal" user_id="{{ $user->id }}" data-target="#user_modal" class="btn btn-info get-user"
   data-hover="tooltip" title="Detalles">
    <i class="glyphicon glyphicon-eye-open"></i>
</a>
@endpermission
@permission('editar_usuarios')
<a href="users/{{ $user->id }}/edit" class="btn btn-primary" data-toggle="tooltip" title="Editar">
    <i class="glyphicon glyphicon-edit"></i>
</a>
@endpermission
@permission('eliminar_usuarios')
    @if($user->status)
        <a href="#" class="btn btn-danger cli" data-toggle="tooltip" title="Desactivar" data-user="{{ $user->id }}">
            <i class="fa fa-trash"></i>
        </a>
    @else
        <a href="#" class="btn btn-success cli" data-toggle="tooltip" title="Activar" data-user="{{ $user->id }}">
            <i class="fa fa-plus"></i>
        </a>
    @endif
@endpermission()
