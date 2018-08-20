@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection
@section('contentheader_title')
    Usuarios
@endsection

@section('main-content')
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar usuario</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            {!!Form::model($user, ['route'=> ['users.update',$user->id], 'method'=>'PUT', 'class'=>'form-horizontal'])!!}

            @include('users.partials.inputs', ['user' => $user])
            <div class="text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a class="btn btn-danger btn-close" href="{{ route('users.index') }}">Cancelar</a>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        activeOption = 'users';
    </script>
@endpush
