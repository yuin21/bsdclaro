@extends('adminlte::page')

@section('title', 'Asignar Cuota')

@section('content_header')
    <a href="{{ route('admin.cuotapersonal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Cuotas Asignadas
    </a>
    <h1 class="text-bold">Asignar Cuota</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.cuotapersonal.store']) !!}
            @include('admin.cuotapersonal.partials.form')
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
    <script>
    // fecha actual en input 
    const fecha = new Date();
    const mes = fecha.toLocaleString('default', { month: 'long' })
    $('#mes').val(mes)
    const año = fecha.getFullYear()
    $('#año').val(año)
    </script>
@stop
