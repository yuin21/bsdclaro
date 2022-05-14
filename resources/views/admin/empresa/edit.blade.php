@extends('adminlte::page')

@section('title', 'Editar Empresa')

@section('content_header')
    <a href="{{ route('admin.empresa.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de empresa
    </a>
    <h1 class="text-bold">Editar Empresa</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('admin.empresa.show', $empresa) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($empresa, ['route' => ['admin.empresa.update', $empresa], 'method' => 'put']) !!}
            @include('admin.empresa.partials.form')
            {!! Form::submit('Editar Empresa', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop
