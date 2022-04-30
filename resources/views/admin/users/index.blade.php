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

@section('js')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El usuario se eliminó con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Elija la opción Eliminar para confirmar.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
@stop
