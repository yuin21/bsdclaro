@extends('adminlte::page')

@section('title', 'Editar Linea')

@section('content_header')
    <a href="{{ route('admin.numero_linea_nueva.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de lineas
    </a>
    <h1 class="text-bold">Editar linea</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('admin.numero_linea_nueva.show', $numero_linea_nueva) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($numero_linea_nueva, ['route' => ['admin.numero_linea_nueva.update', $numero_linea_nueva], 'method' => 'put']) !!}
            @include('admin.numero_linea_nueva.partials.form')
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop
