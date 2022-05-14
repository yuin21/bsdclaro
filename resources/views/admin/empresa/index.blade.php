@extends('adminlte::page')

@section('title', 'Listado de Empresas')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.empresa.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar Empresa
    </a>
    <h1 class="text-bold">Empresa</h1>
@stop

@section('content')
    @include('admin.empresa.form')
@stop

@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La empresa se ha removido con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a remover una empresa',
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
