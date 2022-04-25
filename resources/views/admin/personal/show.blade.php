@extends('adminlte::page')

@section('title', 'Ver Personal')

@section('content_header')
    <h1>Ver Personal</h1>
@stop

@section('content')

    <form action="{{ url('admin/personal/' . $BsdPersonal->id_personal) }}" method="get" enctype="multipart/form-data">

        @include('reporte_venta.movil.form', ['modo' => 'Ver'])

    </form>

@stop
