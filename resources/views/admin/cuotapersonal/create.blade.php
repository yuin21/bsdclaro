@extends('adminlte::page')

@section('title', 'Asignar Cuota')

@section('content_header')
    <a href="{{ route('admin.cuotapersonal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Cuotas Asignadas
    </a>
    <h1 class="text-bold">Asignar Cuota</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.cuotapersonal.store']) !!}
            @include('admin.cuotapersonal.partials.form')
            <div class="float-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
