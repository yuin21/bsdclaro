@extends('adminlte::page')

@section('title', 'Crear Reporte de Venta Movil')

@section('content_header')
    <h1>Editar Reporte de Venta Movil</h1>
@stop

@section('content')
    @if (Session::has('mensaje'))
        <div class="alert alert-success mb-2" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" style="color:white; opacity: initial" data-dismiss="alert"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($personal, ['route' => ['admin.personal.update', $personal->id_personal], 'method' => 'put']) !!}

            @include('admin.personal.partials.form')

            {!! Form::submit('Editar', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
