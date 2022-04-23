@extends('adminlte::page')

@section('title', 'Crear Personal')

@section('content_header')
    <h1>Crear Personal</h1>
@stop

@section('content')

<form action="{{ url('admin/personal') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('personal.form',['modo'=>'Crear'])
    </form>

@stop