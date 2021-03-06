@extends('adminlte::page')

@section('title', 'Crear Personal')

@section('content_header')
    <a href="{{ route('admin.personal.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista del personal
    </a>
    <h1 class="text-bold">Crear Personal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.personal.store']) !!}
            @include('admin.personal.partials.form')
            <div class="float-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop
@section('js')
    <script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        const cargo = document.getElementById('cargo')
        $('#cargo').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            if (isSelected) {
                const cargoName = e.target.value
                //document.write(cargoName)
                if (cargoName === 'Consultor') {
                    $('#div_tipo_personal').show();
                } else {
                    $('#div_tipo_personal').hide();
                }

            }
        });

        $('#tipo_doc_iden').val('DNI');
        $('#tipo_doc_iden').change();
    </script>
@stop
