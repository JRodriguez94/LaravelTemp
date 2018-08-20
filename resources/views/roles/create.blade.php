@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Roles
@endsection
@section('contentheader_title')
    Roles
@endsection

@section('main-content')
    {{-- @include('alerts.messages') --}}
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Alta de rol</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            {!!Form::open(['route'=>'roles.store', 'method'=>'POST', 'class' => 'form-horizontal'])!!}

            @include('roles.partials.inputs', ['role' => null])
            <div class="text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger btn-close" href="{{ route('roles.index') }}">Cancelar</a>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        activeOption = 'roles';
    </script>
@endpush
