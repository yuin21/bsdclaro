@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.productotelefonia.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Producto Telefonía
    </a>
    <h1 class="text-bold">Editar Producto Telefonía</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Producto Telefonía: <span
                    class="badge badge-warning">{{ $productotelefonia->producto }}</span></h5>
            <a href="{{ route('admin.productotelefonia.show', $productotelefonia) }}"
                class="btn btn-sm btn-success text-nowrap">
                <i class="fas fa-pen"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($productotelefonia, ['route' => ['admin.productotelefonia.update', $productotelefonia], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('producto', 'Producto') !!}
                {!! Form::text('producto', null, ['class' => 'form-control']) !!}
                @error('producto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('bsd_servicio_id', 'Servicio') !!}
                {!! Form::select('bsd_servicio_id', $servicios, null, ['class' => 'form-control']) !!}
                @error('bsd_servicio_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            {!! Form::submit('Editar Producto Telefonía', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop
