@extends('adminlte::page')

@section('title', 'Crear Plan')

@section('content_header')
    <a href="{{ route('admin.plan.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de planes
    </a>
    <h1 class="text-bold">Crear Plan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.plan.store']) !!}
            @include('admin.plan.partials.form')
            {!! Form::submit('Registrar Plan', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop
