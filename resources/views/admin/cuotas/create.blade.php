@extends('adminlte::page')

@section('title', 'Crear Cuota')

@section('content_header')
    <a href="{{ route('admin.cuotas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de cuotas
    </a>
    <h1 class="text-bold">Crear Cuota</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            {!! Form::open(['route' => 'admin.cuotas.store']) !!}
            @include('admin.cuotas.partials.form')
            <div class="d-flex"></div>
            <div class="row justify-content-center">
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
