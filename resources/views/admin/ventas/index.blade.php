@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.create') }}" class="btn btn-primary float-right text-nowrap">
        <i class="fas fa-plus-circle"></i> Registrar
    </a>
    <h1 class="text-bold">Lista De Ventas</h1>
@stop

@section('content')
    @livewire('admin.venta-index')
@stop

{{-- Nota: Creo que lo ideal es hacerlo en un apartado, no dentro del mismo codigo html, pero lo intente no habia podido
    Debido al tiempo se quedará así pero falta revisar esta parte. style="display: none;
     @section('js')
    <script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#ver_avance_oportunidad').val('bye')
        });
        $(window).on("load", $('#ver_avance_oportunidad').val('bye'));
    </script>
@endsection --}}
@section('css')
    <style>
    .number{
        text-align: right;
    }
    </style>
@endsection
@section('js')
    @if (session('success') === 'destroyLogico')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'La venta se ha anulado con éxito',
            })
        </script>
    @endif

    <script>
        $('.form-borrar').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Va a anular una venta',
                text: "Puede verlo y restaurarlo en la opción: Anulados",
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
