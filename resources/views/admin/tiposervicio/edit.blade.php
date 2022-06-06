@extends('adminlte::page')

@section('title', 'Editar Tipo de Servicio')

@section('content_header')
    <a href="{{ route('admin.tiposervicio.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de tipo de servicios
    </a>
    <h1 class="text-bold">Editar Tipo de Servicio</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('admin.tiposervicio.show', $tiposervicio) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($tiposervicio, ['route' => ['admin.tiposervicio.update', $tiposervicio], 'method' => 'put']) !!}
            @include('admin.tiposervicio.partials.form')
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop
