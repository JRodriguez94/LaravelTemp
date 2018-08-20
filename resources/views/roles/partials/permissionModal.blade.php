<div class="modal fade" id="permisos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title" style="background-color:#3c8dbc">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <font color="white"><h4 class="modal-title">Gestionar permisos</h4></font>
            </div>
            <div class="modal-body">
                <div>
                    <select id="select-permisos" multiple="multiple">
                        @if(isset($permisos))
                            @foreach($permisos as $permiso)
                                <option value="{{ $permiso->id }}">{{ $permiso->display_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
