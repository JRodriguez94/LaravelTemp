@push('scripts')
<script>
    activeOption = 'users';

    $("#users-table").DataTable({
        processing: true,
        serverSide: true,
        language:{
            url: "{{ asset('/js/Spanish.json') }}"
        },
      ajax:'/users',
      columns: [
        {data: 'username', name: 'username'},
        {data: 'email', name: 'email'},
        {data: 'status', name: 'status'},
        {data: 'actions', name: 'actions', orderable: false, searchable: false},
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

    $('body').delegate('.get-user','click',function(){
        user_id = $(this).attr('user_id');
        $.ajax({
            url : 'users/' + user_id ,
            type : 'GET',
            dataType: 'json',
            data : {id: user_id}
        }).done(function(data){
            console.log(data);
            $("[name='username']").val(data.name + ' ' + data.last_name + ' ' + data.second_last_name);
            $("[name='street']").val(data.street + ' ' + data.outside_number + ' ' + data.interior_number + ' ' + data.neighborhood + ' ' + data.postal_code);
            $("[name='city']").val(data.city + ' ' + data.state);
            $("[name='phonenumber']").val(data.phonenumber);
            $("[name='cellphone']").val(data.cellphone);
            $("[name='base_salary']").val(data.base_salary);
            $("[name='email']").val(data.email);
            $("[name='rol']").val(data.roles[0].display_name)
            if(data.status)
                $("[name='status']").val('Activo');
            else
                $("[name='status']").val('Inactivo');
        });
    });//MODAL .get-user

    function toggleUserStatus(user) {
        $.ajax({
            url: '/users/'+user,
            type: 'DELETE',
        })
        .done(function(response) {
            var usersTable = $('#users-table').DataTable();
            usersTable.ajax.reload();
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

    function confirmStatus(type, user) {
        swal({
            title: '¿Estás seguro de '+ type +' el usuario?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true
        }).then(function () {
            toggleUserStatus(user);
        }).catch(swal.noop);
    }

    $(document).on('click', '.btn.btn-danger.cli', function (event) {
        event.preventDefault();
        var user = $(this).data('user');
        confirmStatus('desactivar', user);
    });

    $(document).on('click', '.btn.btn-success.cli', function (event) {
        event.preventDefault();
        var user = $(this).data('user');
        confirmStatus('activar', user);
    });
</script>
@endpush
