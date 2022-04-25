@extends('adminlte::page')

@section('title', 'Crear Reporte de Venta Movil')

@section('content_header')
    <h1>Editar Reporte de Venta Movil</h1>
@stop

@section('content')
    @include('alerts.success')
    <div class="card">
        <div class="card-body">
            {!! Form::model($personal, ['route' => ['admin.personal.update', $personal], 'method' => 'put']) !!}
            @include('admin.personal.partials.form')
            {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
