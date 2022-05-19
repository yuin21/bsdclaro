@extends('adminlte::page')

@section('title', 'Listado de los Servicios')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.cuotas.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar Cuota
    </a>
    <h1 class="text-bold">Cuotas</h1>
@stop

@section('content')
    @livewire('admin.cuota-index')
@stop

@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La cuota se ha removido con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a remover una cuota',
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
