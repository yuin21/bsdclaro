@extends('adminlte::page')

@section('title', 'Registrar Cliente')

@section('content_header')
    <a href="{{ route('admin.clientes.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de clientes
    </a>
    <h1 class="text-bold">Registrar Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.clientes.store']) !!}
            @include('admin.clientes.partials.form')
            <div class="float-right">
            {!! Form::submit('Registrar ', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
