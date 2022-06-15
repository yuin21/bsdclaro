@extends('adminlte::page')

@section('title', 'Crear estado línea')

@section('content_header')
    <a href="{{ route('admin.estado_linea.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de estado lineas
    </a>
    <h1 class="text-bold">Crear estado línea</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.estado_linea.store']) !!}
            @include('admin.estado_linea.partials.form')
            <div class="float-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@stop
