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
                        {!! Form::date('fecha_registro', $venta->fecha_registro ? Carbon\Carbon::parse($venta->fecha_registro)->format('Y-m-d') : null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                        @error('fecha_registro')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_conforme', 'Fecha Conformidad', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_conforme', $venta->fecha_conforme ? Carbon\Carbon::parse($venta->fecha_conforme)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
                        @error('fecha_conforme')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_envio', 'Fecha Envio', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_envio', $venta->fecha_envio ? Carbon\Carbon::parse($venta->fecha_envio)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
                        @error('fecha_envio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="mb-2">
                        {!! Form::label('fecha_entrega', 'Fecha Entrega', ['class' => 'text-nowrap']) !!}
                        {!! Form::date('fecha_entrega', $venta->fecha_entrega ? Carbon\Carbon::parse($venta->fecha_entrega)->format('Y-m-d') : null, ['class' => 'form-control']) !!}
                        @error('fecha_entrega')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-sm-6">
                    {!! Form::label('observacion', 'Observación') !!}
                    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
                    @error('observacion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-4 col-sm-6">
                    {!! Form::label('estado_venta', 'Estado') !!}
                    {!! Form::select('estado_venta', ['P' => 'Pendiente', 'E' => 'Enviado', 'C' => 'Conforme', 'N' => 'No Conforme'], null, ['class' => 'selectpicker form-control']) !!}
                    @error('estado_venta')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

    @if (session('success') == 'update')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El seguimiento de la venta se editó con éxito',
            })
        </script>
    @endif
@stop
