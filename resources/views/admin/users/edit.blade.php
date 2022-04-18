@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar rol de usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p><b>Usuario:</b> {{ $user->name }}</h3>
            <p>Listado de roles</h2>
                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@stop
