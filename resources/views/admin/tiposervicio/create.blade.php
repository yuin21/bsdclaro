@extends('adminlte::page')

@section('title', 'Crear Tipo de Servicio')

@section('content_header')
    <a href="{{ route('admin.tiposervicio.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de tipos de servicios
    </a>
    <h1 class="text-bold">Crear Tipo de Servicio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tiposervicio.store']) !!}
            @include('admin.tiposervicio.partials.form')
            <div class="float-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
