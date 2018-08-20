@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Roles
@endsection
@section('contentheader_title')
    Roles
@endsection

@include('roles.partials.header')

@section('main-content')
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de Roles</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover" id="roles-table">
                <thead>
                <tr>
                    <th style="text-align:center">Nombre</th>
                    <th style="text-align:center">Descripción</th>
                    <th style="text-align:center">Estatus</th>
                    <th style="text-align:center">Acciones</th>
                </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Estatus</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @include('roles.partials.permissionModal')
    @include('roles.partials.modal')
    @include('roles.partials.script')

@endsection
