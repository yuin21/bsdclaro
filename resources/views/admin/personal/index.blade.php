@extends('adminlte::page')

@section('title', 'Listado del Personal')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.personal.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar Personal
    </a>
    <h1 class="text-bold">Personal</h1>
@stop

@section('content')
    @livewire('admin.personal-index')
@stop

@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El personal se ha removido con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a remover un personal',
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
