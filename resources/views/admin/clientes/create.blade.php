@extends('adminlte::page')

@section('title', 'Registrar Cliente')

@section('content_header')
    <a href="{{ route('admin.clientes.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de clientes
    </a>
    <h1 class="text-bold">Registrar Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.clientes.store']) !!}
            <div class="mb-2 d-flex" style="gap:10px">
                <button type="button" id="btnSearchCliente" class="btn btn-outline-secondary"
                    style="border-radius: 0 3px 3px 0; opacity: 0.8">Buscar RUC SUNAT <i class="fas fa-search"></i></button>
                <div id="cliente_loading" class="text-danger d-none">
                    <div class="spinner-border text-danger float-rigth" role="status">
                    </div>
                </div>
            </div>
            @include('admin.clientes.partials.form')
            {!! Form::submit('Registrar Cliente', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script>
        // busqueda de RUC para obtener Razon social

        $(document).ready(function() {
            $('#btnSearchCliente').click(function(e) {
                if ($("#ruc").val() === '') return
                handleSearchClient_sunat()
            })
            $("#ruc").keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13) {
                    e.preventDefault();
                    if (!e.target.value.trim()) return
                    handleSearchClient_sunat()
                }
            });
        });

        function handleSearchClient_sunat() {
            $('#cliente_loading').removeClass('d-none')
            $.ajax({
                type: 'GET',
                url: '{{ route('api.clientes.searchSunat') }}',
                data: {
                    term: $("#ruc").val()
                },
                success: function(response) {
                    $('#cliente_loading').addClass('d-none')
                    const data = JSON.parse(response)
                    const razonSocial = data.result.razon_social
                    if (data && data.result && razonSocial) {
                        $('#razon_social').val(razonSocial)
                    }
                },
                error: function(response) {
                    $('#cliente_loading').addClass('d-none')
                    $('#razon_social').val('')
                }
            });
        }
    </script>
@stop
