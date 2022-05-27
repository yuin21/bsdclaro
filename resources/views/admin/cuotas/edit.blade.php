@extends('adminlte::page')

@section('title', 'Editar Cuota')

@section('content_header')
    <a href="{{ route('admin.cuotas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de cuotas
    </a>
    <h1 class="text-bold">Editar Cuota</h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-header d-flex flex-wrap justify-content-end align-items-center">
            <a href="{{ route('admin.cuotas.show', $cuota) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($cuota, ['route' => ['admin.cuotas.update', $cuota], 'method' => 'put']) !!}
            @include('admin.cuotas.partials.form')
            <div class="float-right">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
