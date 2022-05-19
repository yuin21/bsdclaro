@extends('adminlte::page')

@section('title', 'Editar Cuota Asignada')

@section('content_header')
    <a href="{{ route('admin.cuotapersonal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Cuotas Asignadas
    </a>
    <h1 class="text-bold">Editar Cuota Asignada</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('admin.cuotapersonal.show', $cuotapersonal) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($cuotapersonal, ['route' => ['admin.cuotapersonal.update', $cuotapersonal], 'method' => 'put']) !!}
            @include('admin.cuotapersonal.partials.form')
            <div class="float-right">
                {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
