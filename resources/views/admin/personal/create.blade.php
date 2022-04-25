@extends('adminlte::page')

@section('title', 'Crear Personal')

@section('content_header')
    <h1>Crear Personal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.personal.store']) !!}

            @include('admin.personal.partials.form')

            {!! Form::submit('Crear', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
