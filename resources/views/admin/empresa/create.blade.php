@extends('adminlte::page')

@section('title', 'Crear Empresa')

@section('content_header')
    <a href="{{ route('admin.empresa.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de empresa
    </a>
    <h1 class="text-bold">Crear Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.empresa.store']) !!}
            @include('admin.empresa.partials.form')
            <div class="float-right">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
