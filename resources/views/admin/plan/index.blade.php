@extends('adminlte::page')

@section('title', 'Listado de los Planes')

@section('content_header')
    <a class="btn btn-primary float-right text-nowra" href="{{ route('admin.plan.create') }}">
        <i class="fas fa-plus-circle"></i> Registrar Plan
    </a>
    <h1 class="text-bold">Plan</h1>
@stop

@section('content')
    @livewire('admin.plan-index')
@stop

@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'El plan se ha removido con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a remover un plan',
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
