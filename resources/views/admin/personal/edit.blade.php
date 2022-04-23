@extends('adminlte::page')

@section('title', 'Crear Reporte de Venta Movil')

@section('content_header')
    <h1>Editar Reporte de Venta Movil</h1>
@stop

@section('content')

    <form action="{{ url('admin/reporte_venta_movil/'.$reporteventamovil->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
            @include('reporte_venta.movil.form',['modo'=>'Editar'])
    </form>

@stop