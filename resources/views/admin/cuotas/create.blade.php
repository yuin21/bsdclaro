@extends('adminlte::page')

@section('title', 'Crear Cuota')

@section('content_header')
    <a href="{{ route('admin.cuotas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de cuotas
    </a>
    <h1 class="text-bold">Crear Cuota</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-4 d-flex justify-content-around align-items-end">
                <div class="col-lg-8 col-sm-6">
                    {!! Form::open(['route' => 'admin.cuotas.store']) !!}
                    @include('admin.cuotas.partials.form')
                </div>
                <div class="col-lg-4 col-md-6" id="botones">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
#botones    {
    margin-bottom: 16px;
    }
</style>
@stop