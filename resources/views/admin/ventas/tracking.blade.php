@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de ventas
    </a>
    <h1 class="text-bold">Seguimiento Venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($venta, ['route' => ['admin.ventas.tranckingupdate', $venta], 'method' => 'put']) !!}
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_registro', 'Fecha Registro', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_registro', $venta->fecha_registro ? Carbon\Carbon::parse($venta->fecha_registro)->format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'fecha_registro']) !!}
                        @error('fecha_registro')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_conforme', 'Fecha Conformidad', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_conforme', $venta->fecha_conforme ? Carbon\Carbon::parse($venta->fecha_conforme)->format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'fecha_conforme']) !!}
                        @error('fecha_conforme')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_envio', 'Fecha Envio', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_envio', $venta->fecha_envio ? Carbon\Carbon::parse($venta->fecha_envio)->format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'fecha_envio']) !!}
                        @error('fecha_envio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_entrega', 'Fecha Entrega', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_entrega', $venta->fecha_entrega ? Carbon\Carbon::parse($venta->fecha_entrega)->format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'fecha_entrega_te']) !!}
                        @error('fecha_entrega')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
