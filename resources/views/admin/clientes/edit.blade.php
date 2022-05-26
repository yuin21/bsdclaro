@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <a href="{{ route('admin.clientes.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de clientes
    </a>
    <h1 class="text-bold">Editar Cliente</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('admin.clientes.show', $cliente) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($cliente, ['route' => ['admin.clientes.update', $cliente], 'method' => 'put']) !!}
            @include('admin.clientes.partials.form')
            <div class="float-right">
            {!! Form::submit('Editar Cliente', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
