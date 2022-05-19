@extends('adminlte::page')

@section('title', 'Crear Reporte de Venta Movil')

@section('content_header')
    <a href="{{ route('admin.personal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de personal
    </a>
    <h1 class="text-bold">Editar Personal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="flex-grow-1">Personal: <span class="badge badge-warning">
                    {{ $personal->ape_paterno }} {{ $personal->ape_materno }} {{ $personal->nom_personal }}</span>
            </h5>
            <a href="{{ route('admin.personal.show', $personal) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($personal, ['route' => ['admin.personal.update', $personal], 'method' => 'put']) !!}
            @include('admin.personal.partials.form')
            <div class="float-right">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
