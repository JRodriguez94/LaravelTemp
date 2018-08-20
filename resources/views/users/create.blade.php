@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuarios
@endsection
@section('contentheader_title')
    Usuarios
@endsection

@section('main-content')


    <div class="box box-solid box-primary">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box-header with-border">
            <h3 class="box-title">Alta de usuario</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            {!!Form::open(['route'=>'users.store', 'method'=>'POST', 'class' => 'form-horizontal'])!!}

            @include('users.partials.inputs', ['user' => null])
            <div class="text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
