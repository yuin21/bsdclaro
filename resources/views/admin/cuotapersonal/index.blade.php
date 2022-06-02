@extends('adminlte::page')

@section('title', 'Listado de las Cuotas Asignadas')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.cuotapersonal.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar 
    </a>
    <h1 class="text-bold">Cuotas Asignada</h1>
@stop

@section('content')
    @livewire('admin.cuotapersonal-index')
@stop

@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La cuota asignada se ha removido con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a remover una cuota asignada',
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
