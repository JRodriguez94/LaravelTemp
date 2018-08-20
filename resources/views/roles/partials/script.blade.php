@push('scripts')
<script>
    activeOption = 'roles';

    $("#roles-table").DataTable({
        processing: true,
        serverSide: true,
        language:{
            url: "{{ asset('/js/Spanish.json') }}"
        },
      ajax:'/roles',
      columns: [
        {data: 'display_name', name: 'display_name'},
        {data: 'description', name: 'description'},
        {data: 'status', name: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                if(column[0][0] == 2){
                    var select = $('<select class="form-control" style="width: 100%;"><option value="">Filtrar estatus por:</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    });
                    select.append( '<option value="Inactivo">Inactivo</option>' );
                    select.append( '<option value="Activo">Activo</option>' );
                }
            });
        }
    });

    $('body').delegate('.get-role','click',function(){
        id_role = $(this).attr('id_role');
        $.ajax({
            url : '/roles/' + id_role ,
            type : 'GET',
            dataType: 'json',
            data : {id: id_role}
        }).done(function(data){
            console.log(data);
            $("[name='name']").val(data.display_name);
            $("[name='description']").val(data.description);
        });
    });//MODAL .get-role

    function toggleRoleStatus(role) {
        $.ajax({
            url: '/roles/'+role,
            type: 'DELETE',
        })
        .done(function(response) {
            var rolesTable = $('#roles-table').DataTable();
            rolesTable.ajax.reload();
            console.log(response)
            swal({
                title: response.title,
                text: response.text,
                timer: 3000,
                type: response.type
            }).catch(swal.noop);
        })
        .fail(function() {
            swal(
                'Oops...',
                'Ocurrio un error',
                'error'
            );
        });
    }

    function confirmStatus(type, role) {
        swal({
            title: '¿Estás seguro de '+ type +' el rol?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true
        }).then(function () {
            toggleRoleStatus(role);
        }).catch(swal.noop);
    }

    $(document).on('click', '.btn.btn-danger.cli', function (event) {
        event.preventDefault();
        var role = $(this).data('role');
        confirmStatus('desactivar', role);
    });

    $(document).on('click', '.btn.btn-success.cli', function (event) {
        event.preventDefault();
        var role = $(this).data('role');
        confirmStatus('activar', role);
    });

    id_role = null;
    $('#select-permisos').multiSelect({
        selectableHeader: "<h4 class='text-center'><b>Permisos <span class='text-danger'>NO</span> asignados</h4></b>",
        selectionHeader: "<h4  class='text-center'><b>Permisos asignados</h4></b>",
        afterSelect:function(value){//sends id to assign permission to a role
            $.ajax({
                url : '{{ URL::to("/permissions/assign") }}',
                type : 'GET',
                dataType: 'json',
                data : {permission_id: value[0], role_id: id_role}
            }).done(function(data){
                console.log(data);
            });
        },
        afterDeselect:function(value){//sends id to unassign permission to a role
            $.ajax({
                url : '{{ URL::to("/permissions/unassign") }}',
                type : 'GET',
                dataType: 'json',
                data : {permission_id: value[0], role_id: id_role}
            }).done(function(data){
                console.log(data);
            });
        }
    });//MULTISELECT #select-permisos

    $('body').delegate('.get-permisos','click',function(){
        id_role = $(this).attr('id_role');
        $('#select-permisos option').prop('selected', false);
        $.ajax({
            url : '{{ URL::to("/permissions") }}',
            type : 'GET',
            dataType: 'json',
            data : {id: id_role}
        }).done(function(data){
            $.each(data.assignedPermissions ,function(index, value){
                console.log(value);
                $('#select-permisos option[value="'+value.id+'"]').prop('selected', true);
            });
            $('#select-permisos').multiSelect('refresh');
        });
    });//REQUEST #get-permisos

    $('body').on('mouseenter', '#roles-table',function() {
        $('[data-hover="tooltip"]').tooltip();
    });

    @if (Session::has('message'))
        sAlert(
            "{{ Session::get('message.title') }}",
            "{{ Session::get('message.type') }}",
            "{{ Session::get('message.text') }}"
        );
    @endif

    function sAlert(title, type, text)
    {
        swal({
            title: title,
            type: type,
            text: text,
            confirmButtonText: "Continuar",
            timer: 3000
        });
    }

</script>
@endpush
