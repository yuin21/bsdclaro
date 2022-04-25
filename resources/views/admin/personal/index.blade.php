@extends('adminlte::page')

@section('title', 'Listado del Personal')

@section('content_header')
    <h1>Personal</h1>
@stop

@section('content')
    @include('alerts.success')
    @livewire('admin.personal-index')
@stop
