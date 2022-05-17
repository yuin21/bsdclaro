@extends('adminlte::page')

@section('title', 'Listado de las lineas nuevas')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.numero_linea_nueva.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar Tipo de Servicio
    </a>
    <h1 class="text-bold">Lineas nuevas</h1>
@stop

@section('content')
    @include('admin.numero_linea_nueva.form')
@stop

@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La linea se ha removido con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a remover una linea',
                text: "Puede restaurarlo o eliminarlo para siempre en la opción: Removidos",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
@stop
