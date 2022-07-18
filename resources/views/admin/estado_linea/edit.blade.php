@extends('adminlte::page')

@section('title', 'Editar estado línea')

@section('content_header')
    <a href="{{ route('admin.estado_linea.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de estado líneas
    </a>
    <h1 class="text-bold">Editar Estados de las línea</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('admin.estado_linea.show', $estado_linea) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($estado_linea, ['route' => ['admin.estado_linea.update', $estado_linea], 'method' => 'put']) !!}
            @include('admin.estado_linea.partials.form')
            <div class="float-right">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
