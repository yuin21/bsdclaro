@extends('adminlte::page')

@section('title', 'Crear linea Nueva')

@section('content_header')
    <a href="{{ route('admin.numero_linea_nueva.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista lineas 
    </a>
    <h1 class="text-bold">Crear linea</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.numero_linea_nueva.store']) !!}
            @include('admin.numero_linea_nueva.partials.form')
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop
