@extends('adminlte::page')

@section('title', 'Editar Plan')

@section('content_header')
    <a href="{{ route('admin.plan.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de planes
    </a>
    <h1 class="text-bold">Editar Plan</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <a href="{{ route('admin.plan.show', $plan) }}" class="btn btn-sm btn-info text-nowrap">
                <i class="fas fa-eye"></i> Ver
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($plan, ['route' => ['admin.plan.update', $plan], 'method' => 'put']) !!}
            @include('admin.plan.partials.form')
            <div class="float-right">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
