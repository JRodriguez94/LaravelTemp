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
            <h3 class="box-title">Lista de usuarios</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover" id="users-table">
                <thead>
                <tr>
                    <th style="text-align:center">Nombre</th>
                    <th style="text-align:center">Correo</th>
                    <th style="text-align:center">Estatus</th>
                    <th style="text-align:center">Acciones</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('users.partials.modal')
    @include('users.partials.scripts')
@endsection
