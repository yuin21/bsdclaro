@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right text-nowrap">
        <i class="fas fa-plus-circle"></i> Crear Usuario
    </a>
    <h1 class="text-bold">Lista De Usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop
