@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de ventas
    </a>
    <h1 class="text-bold">Registrar venta</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.ventas.store', 'id' => 'formCrearVenta']) !!}

    <div class="row">
        <div class="col-8">
            <div class="card" id="div_datos_generales">
                <div class="card-header">
                    <p class="h5 text-bold">Datos generales</p>
                </div>
                <div class="card-body" id="">
                    <div class="row mb-4 d-flex justify-content-around" id="div_venta">
                    {{-- <div class="row mb-4"> --}}
                        <div class="col-lg-2 col-sm-6" >
                            {!! Form::label('sec', 'SEC*') !!}
                            {!! Form::text('sec', null, ['class' => 'form-control']) !!}
                            @error('sec')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-sm-6" id="div_sot">
                            {!! Form::label('sot', 'SOT') !!}
                            {!! Form::text('sot', null, ['class' => 'form-control', 'id' => 'sot']) !!}
                            @error('sot')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-sm-6" id="div_nro_proyecto">
                            {!! Form::label('nro_proyecto', 'Nro. Proyecto') !!}
                            {!! Form::text('nro_proyecto', null, ['class' => 'form-control']) !!}
                            @error('nro_proyecto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-sm-6" id="div_solicitud">
                            {!! Form::label('solicitud', 'Nro. Solicitud') !!}
                            {!! Form::text('solicitud', null, ['class' => 'form-control']) !!}
                            @error('solicitud')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            {!! Form::label('tipo_contrato', 'Tipo de Contrato*') !!}
                            {!! Form::select('tipo_contrato', ['F' => 'Físico', 'D' => 'Digital'],null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                            @error('tipo_contrato')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            {!! Form::label('salesforce', 'Salesforce*') !!}
                            {!! Form::select('salesforce', ['S' => 'Si', 'N' => 'No'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                            @error('salesforce')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            {!! Form::label('nro_oportunidad', 'Nro. Oportunidad*') !!}
                            {!! Form::text('nro_oportunidad', null, ['class' => 'form-control']) !!}
                            @error('nro_oportunidad')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    {{-- </div>
                    <div class="row"> --}}
                        <div class="col-lg-3 col-sm-6">
                            {!! Form::label('avance_oportunidad', 'Avance de Oport.*') !!}
                            {!! Form::select('avance_oportunidad', ['10' => '10%', '50' => '50%','90' => '90%','100' => '100%'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                            @error('avance_oportunidad')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 ">
                            <div class="mb-2">
                                {!! Form::label('fecha_avance_oportunidad', 'Fecha Avance Oport.', ['class' => 'text-nowrap']) !!}
                                {!! Form::date('fecha_avance_oportunidad', null, ['class' => 'form-control', 'id' => 'fecha_avance_oportunidad']) !!}
                                @error('fecha_avance_oportunidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 ">
                            <div class="mb-2">
                                {!! Form::label('fecha_oportunidad_ganada', 'Fecha Oport. Ganada', ['class' => 'text-nowrap']) !!}
                                {!! Form::date('fecha_oportunidad_ganada', null, ['class' => 'form-control', 'id' => 'fecha_oportunidad_ganada']) !!}
                                @error('fecha_oportunidad_ganada')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 ">
                            <div class="mb-2">
                                {!! Form::label('fecha_entrega', 'Fecha Envio de Exp.', ['class' => 'text-nowrap']) !!}
                                {!! Form::date('fecha_entrega', null, ['class' => 'form-control', 'id' => 'fecha_entrega_te']) !!}
                                @error('fecha_entrega')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    {{-- </div>
                    <div class="row mt-2"> --}}
                        <div class="col-lg-3 ">
                            <div class="mb-2">
                                {!! Form::label('fecha_conforme', 'Fecha Confor. Exp.', ['class' => 'text-nowrap']) !!}
                                {!! Form::date('fecha_conforme', null, ['class' => 'form-control', 'id' => 'fecha_conforme']) !!}
                                @error('fecha_conforme')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-lg-4 col-sm-6" id="div_estado_venta">
                            {!! Form::label('estado_venta', 'Estado de Expediente*') !!}
                            {!! Form::select('estado_venta', ['P' => 'Pendiente', 'E' => 'Enviado', 'C' => 'Conforme', 'N' => 'No Conforme'], null, ['class' => 'selectpicker form-control', 'id' => 'estado_venta']) !!}
                            @error('estado_venta')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-6" id="div_observacion">
                            {!! Form::label('observacion', 'Observación') !!}
                            {!! Form::text('observacion', null, ['class' => 'form-control','id' => 'observacion']) !!}
                            @error('observacion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalles de venta</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <select name="selectTipoServicio" id="selectTipoServicio" class="selectpicker form-control"
                            title="Seleccionar Tipo Servicio*">
                                @foreach ($tiposservicio as $tiposervicio)
                                    <option value="{{ $tiposervicio->id }}_{{ $tiposervicio->nom_tipo_servicio }}">
                                        {{ $tiposervicio->nom_tipo_servicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="selectServicio" id="selectServicio" class="selectpicker form-control"
                                title="Seleccionar Servicio*">
                                @foreach ($servicios as $servicio)
                                    <option
                                        value="{{ $servicio->id }}_{{ $servicio->nom_servicio }}_{{ $servicio->bsd_tipo_servicio_id }}">
                                        {{ $servicio->nom_servicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="selectPlan" id="selectPlan" class="selectpicker form-control"
                                title="Seleccionar Plan*">
                                @foreach ($planes as $plan)
                                    <option
                                        value="{{ $plan->id }}_{{ $plan->nombre_plan }}_{{ $plan->precio }}_{{ $plan->bsd_tipo_servicio_id }}">
                                        {{ $plan->nombre_plan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('precioplan', 'Precio del plan*', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('precioplan', number_format(0,2), ['class' => 'form-control mt-2', 'id' => 'precioplan', 'placeholder' => 'precio plan']) !!}
                            </div>
                        </div>
                        <div class="col-6" id="div_cantidad">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('inputCantidad', 'Cantidad*', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('inputCantidad', 0, ['class' => 'form-control mt-2', 'id' => 'inputCantidad', 'placeholder' => 'cantidad']) !!}
                            </div>
                        </div>
                        <div class="col-6" id="div_ugis">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('inputUgis', 'Ugis', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('inputUgis', 0, ['class' => 'form-control mt-2', 'id' => 'inputUgis', 'placeholder' => 'ugis', 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                        <div class="col-6" id="div_inputNumerosLineasNuevas">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('inputNumerosLineasNuevas', 'Números de linea nueva', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('inputNumerosLineasNuevas', null, ['class' => 'form-control mt-2', 'id' => 'inputNumerosLineasNuevas', 'placeholder' => 'Números de Lineas nuevas']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('estado_linea', 'Estado de Linea *', ['style' => 'margin-top: 15px; min-width:180px']) !!}
                                {{-- {!! Form::select('estado_linea', $estadoslinea, null, ['class' => 'selectpicker form-control', 'id' => 'estadoLinea', 'title'=>'Seleccione'],  ['style' =>  'margin-top: 17px'] ) !!}
                                 --}}
                                <select name="estado_linea" id="estadoLinea" class="selectpicker form-control"
                                title="Seleccionar">
                                    @foreach ($estadoslinea as $estado)
                                        <option
                                            value="{{ $estado->id }}_{{ $estado->nombre_estado_linea }}_{{ $estado->bsd_tipo_servicio_id }}">
                                            {{ $estado->nombre_estado_linea }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6" id="div_equipoproducto">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('inputEquipoProducto', 'Equipo/Producto*', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('inputEquipoProducto', null, ['class' => 'form-control mt-2', 'id' => 'inputEquipoProducto']) !!}
                            </div>

                        </div>
                        <div class="col-6" id="div_operador">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('operador', 'Operador', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('operador', null, ['class' => 'form-control mt-2', 'id' => 'inputOperador']) !!}
                            </div>
                        </div>
                       <div class="col-6" id="div_fecha_activado">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('fecha_activado', 'Fecha Activado', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::date('fecha_activado', null, ['class' => 'form-control mt-2', 'id' => 'fecha_activado']) !!}
                            </div>
                         </div>
                        {{-- <div class="col-6" id="div_fecha_liquidado">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('fecha_liquidado', 'Fecha Liquidado', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::date('fecha_liquidado', null, ['class' => 'form-control mt-2', 'id' => 'fecha_liquidado']) !!}
                            </div>
                        </div> --}}
                    {{-- <div class="row">
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('status_100_por', 'Status 100%', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('status_100_por', null, ['class' => 'form-control mt-2', 'id' => 'inputStatus']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('numero_proyecto', 'Numero de Proyecto', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('numero_proyecto', null, ['class' => 'form-control mt-2', 'id' => 'inputNumeroProyecto']) !!}
                            </div>
                        </div>
                    </div> --}}
                        {{-- <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('fecha_instalacion', 'Fecha Instalación', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::date('fecha_instalacion', null, ['class' => 'form-control mt-2', 'id' => 'fecha_instalacion']) !!}
                            </div>
                        </div> --}}
                        <div class="col-6" id="div_hora">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('hora', 'Hora', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::time('hora', null, ['class' => 'form-control mt-2', 'id' => 'hora']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::button('Agregar', ['class' => 'btn btn-success btn-sm mt-2', 'id' => 'btnAgregar']) !!}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="border">
                                <tr>
                                    <th>Item</th>
                                    <th>Tipo Servicio</th>
                                    <th>Servicio</th>
                                    <th>Plan</th>
                                    <th>Precio Plan</th>
                                    <th>Cantidad</th>
                                    <th>Ugis</th>
                                    <th>Números de linea nueva</th>
                                    <th>Equipo/Producto</th>

                                    <th>Operador</th>
                                    <th>Estado de Linea</th>
                                    <th>Fecha Activado</th>
                                    <th>Hora</th>

                                    <th>Sin IGV</th>
                                    <th>Total</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbodyDetalleVenta">
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 d-flex justify-content-end align-items-center" style="gap: 10px;">
                        {!! Form::label('total_sin_igv', 'Sin IGV', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal_sin_igv', null, ['class' => 'form-control', 'id' => 'inputTotal_sin_igv', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                        {!! Form::hidden('total_sin_igv', null) !!}
                    </div>
                    <div class="d-flex justify-content-end align-items-center text-danger" style="gap: 10px;">
                        {!! Form::label('total', 'Total', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal', null, ['class' => 'form-control text-danger', 'id' => 'inputTotal', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                        {!! Form::hidden('total', null) !!}
                    </div>
                </div>
                <div class="card-footer">
                    @error('tiposServicio')
                        <span class="text-danger">El detalle de venta es obligatorio</span>
                    @enderror
                    {{-- @error('servicios')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @error('planes')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @error('precioplanes')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @error('cantidades')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @error('total')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror --}}
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Personal</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('searchPersonal', 'Apellidos y nombre') !!}
                        {!! Form::hidden('bsd_personal_id', null, ['id' => 'bsd_personal_id']) !!}
                        {!! Form::text('searchPersonal', null, ['class' => 'form-control', 'id' => 'searchPersonal']) !!}
                        <div class="input-group mt-2">
                            <span class="input-group-text">cargo</span>
                            {!! Form::text('personal_cargo', null, ['class' => 'form-control', 'id' => 'personal_cargo', 'readonly']) !!}
                        </div>
                        @error('bsd_personal_id')
                            <small class="text-danger">El personal es obligatorio</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <p class="h5 text-bold" style="flex-grow: 1">Cliente</p>
                        <div id="cliente_loading" class="text-danger d-none">
                            <span class="text-danger mr-2">
                                Buscando SUNAT
                            </span>
                            <div class="spinner-border text-danger float-rigth" role="status">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('searchCliente', 'RUC') !!}
                        {!! Form::hidden('bsd_cliente_id', null, ['id' => 'bsd_cliente_id']) !!}
                        {{-- {!! Form::hidden('razon_social', null, ['id' => 'razon_social']) !!} --}}
                        <div class="input-group">
                            {!! Form::text('searchCliente', null, ['class' => 'form-control', 'id' => 'searchCliente']) !!}
                            <button type="button" id="btnSearchCliente" class="btn btn-outline-secondary"
                                style="border-radius: 0 3px 3px 0; opacity: 0.6"><i class="fas fa-search"></i></button>
                        </div>

                        <div class="input-group mt-2">
                            <span class="input-group-text">razón social</span>
                            {!! Form::text('razon_social', null, ['class' => 'form-control', 'id' => 'razon_social', 'readonly']) !!}
                        </div>
                        @error('razon_social')
                            <small class="text-danger">El cliente es obligatorio</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-right pb-4">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger btn-lg ml-1">Cancelar</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <style>
    #precioplan{
        font-weight: bold;
        text-align: right;
    }
    #inputCantidad{
        text-align: right;
    }
    #inputUgis{
        text-align: right;
    }
    #dv_precioplan{
        text-align: right;
    }
    #dv_cantidad{
        text-align: right;
    }
    #dv_subtotal_sin_igv{
        text-align: right;
    }
    #dv_subtotal_igv{
        text-align: right;
    }
    #inputTotal_sin_igv{
        text-align: right;
    }
    #inputTotal{
        text-align: right;
    }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        // busqueda de personal
        $('#searchPersonal').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('api.personal.search') }}",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data)
                    }
                })
            },
            select: function(evento, selected) {
                $('#bsd_personal_id').val(selected.item.id);
                $('#personal_cargo').val(selected.item.cargo)
            }
        })
        $("#searchPersonal").keypress(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                e.preventDefault()
                if (e.target.value === '') {
                    $('#bsd_personal_id').val('');
                    $('#personal_cargo').val('')
                }
            }
        });

        // busqueda de cliente

        $(document).ready(function() {
            $('#btnSearchCliente').click(function(e) {
                handleSearchClient()
            })
            $("#searchCliente").keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13) {
                    e.preventDefault();
                    handleSearchClient()
                }
            });
        });

        function handleSearchClient() {
            $.ajax({
                type: 'GET',
                url: '{{ route('api.clientes.search') }}',
                data: {
                    term: $("#searchCliente").val()
                },
                success: function(response) {
                    if (response && response.length > 0) {
                        $('#bsd_cliente_id').val(response[0].id);
                        $('#razon_social').val(response[0].razon_social)
                    } else {
                        $('#bsd_cliente_id').val('');
                        $('#razon_social').val('')
                        if ($("#searchCliente").val().length > 0) {
                            handleSearchClient_sunat()
                        }
                    }
                },
                error: function(response) {
                    $('#bsd_cliente_id').val('');
                    $('#razon_social').val('')
                }
            });
        }

        function handleSearchClient_sunat() {
            $('#cliente_loading').removeClass('d-none')
            $.ajax({
                type: 'GET',
                url: '{{ route('api.clientes.searchSunat') }}',
                data: {
                    term: $("#searchCliente").val()
                },
                success: function(response) {
                    $('#cliente_loading').addClass('d-none')
                    const data = JSON.parse(response)
                    const razonSocial = data.result.razon_social
                    if (data && data.result && razonSocial) {
                        $('#bsd_cliente_id').val(null); // null porque se registrara un nuevo cliente
                        $('#razon_social').val(razonSocial)
                    }
                },
                error: function(response) {
                    $('#cliente_loading').addClass('d-none')
                    $('#bsd_cliente_id').val('');
                    $('#razon_social').val('')
                }
            });
        }
    </script>
    <script>
        const selectTipoServicio = document.getElementById('selectTipoServicio')
        const selectServicio = document.getElementById('selectServicio')
        const selectPlan = $('#selectPlan')
        const inputCantidad = document.getElementById('inputCantidad')
        const inputUgis = document.getElementById('inputUgis')
        const inputNumerosLineasNuevas = document.getElementById('inputNumerosLineasNuevas')
        const inputEquipoProducto = document.getElementById('inputEquipoProducto')
        const btnAgregar = document.getElementById('btnAgregar')
        const tbodyDetalleVenta = document.getElementById('tbodyDetalleVenta')
        const inputTotal = document.getElementById('inputTotal')
        const inputTotal_sin_igv = document.getElementById('inputTotal_sin_igv')
        const total = document.getElementById('total')
        const total_sin_igv = document.getElementById('total_sin_igv') // input hidden para mandar a registrar
        //Agregar data de valores nulos
        const inputOperador = document.getElementById('inputOperador')
        const estadoLinea = document.getElementById('estadoLinea')
        const fecha_activado = document.getElementById('fecha_activado')
        //const fecha_liquidado = document.getElementById('fecha_liquidado')
        //const inputStatus = document.getElementById('inputStatus')
        //const inputNumeroProyecto = document.getElementById('inputNumeroProyecto')
        //const fecha_instalacion = document.getElementById('fecha_instalacion')
        const hora = document.getElementById('hora')

        let cantDetallesVenta = 0 // parecido al cont
        let cont = 0 // el cont sirve para manejar un id diferente de cada detalle venta para eliminarlo
        let total_igv = 0
        let total_sinigv = 0
        const IGV = 1.18

        // fecha actual en input
        // const fecha = new Date();
        // $('#fecha_entrega_te').val(fecha.toJSON().slice(0, 10))

        //desabilitar select servicio y plan al iniciar
        $('#selectPlan').prop('disabled', true);
        $('#selectServicio').prop('disabled', true);
        $('#estadoLinea').prop('disabled', true);
        $('#selectPlan').selectpicker('refresh');
        $('#selectServicio').selectpicker('refresh');
        $('#estadoLinea').selectpicker('refresh');
        $('#inputOperador').attr("readonly", true);

        $('#div_datos_generales').hide();

        // habilitar select servicio y plan cuando se elige un tipo de servicio
        $('#selectTipoServicio').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            if (isSelected) {
                const [tipoServicioID, tipoServicioName] = e.target.value.split(
                    '_') // formato tipo servicio: ID, NOMBRE
                //document.write(tipoServicioName.replace(/ /g, ""))
                // habilitar los select
                $('#selectPlan').prop('disabled', false);
                $('#selectServicio').prop('disabled', false);
                $('#estadoLinea').prop('disabled', false);

                // filtrar select servicio
                $("#selectServicio").val('default');
                $.map($("#selectServicio option"), function(option) {
                    const value = option.value
                    if (value) {
                        const servicio = value.split('_') // formato servicio: ID , NOMBRE, ID_TIPO_SERVICIO
                        const helper = "#selectServicio option[value=" + value + "]"
                        if (tipoServicioID !== servicio[2]) {
                            $(`#selectServicio option[value='${value}']`).hide()
                        } else {
                            $(`#selectServicio option[value='${value}']`).show()
                        }
                    }
                    return option;
                })
                // filtrar select estado linea
                $("#estadoLinea").val('default');
                $.map($("#estadoLinea option"), function(option) {
                    const value = option.value
                    if (value) {
                        const estado = value.split('_') // formato servicio: ID , NOMBRE, ID_TIPO_SERVICIO
                        const helper = "#estadoLinea option[value=" + value + "]"
                        if (tipoServicioID !== estado[2]) {
                            $(`#estadoLinea option[value='${value}']`).hide()
                        } else {
                            $(`#estadoLinea option[value='${value}']`).show()
                        }
                    }
                    return option;
                })
                // filtrar select plan
                $("#selectPlan").val('default');
                $.map($("#selectPlan option"), function(option) {
                    const value = option.value
                    if (value) {
                        const plan = value.split('_') // formato plan: Id, nombre, precio, ID_TIPO_SERVICIO
                        const helper = "#selectPlan option[value=" + value + "]"
                        if (tipoServicioID !== plan[3]) {
                            $(`#selectPlan option[value='${value}']`).hide()
                        } else {
                            $(`#selectPlan option[value='${value}']`).show()
                        }
                    }
                    return option;
                })

                // refrescar los campos generales
                $('#precioplan').val(0)
                $('#selectPlan').selectpicker('refresh');
                $('#selectServicio').selectpicker('refresh');
                $('#estadoLinea').selectpicker('refresh');
                //Acomodar los campos
                $('#div_datos_generales').show();
                $('#div_solicitud').hide();
                //$('#div_venta').addClass('d-flex justify-content-around');
                //deshabilitar y limpiar campos cuando se elija el tipo de servicio movil
                if (tipoServicioName === 'Móvil') {
                    //$('#sot').val(null);
                    //$('#sot').attr("disabled", true);
                    $('#div_sot').hide();
                    $('#div_nro_proyecto').hide();
                    //$('#div_fecha_liquidado').hide();
                    $('#div_hora').hide();
                    $('#div_observacion').removeClass('col-lg-3').addClass('col-lg-6');
                    $('#div_observacion').removeClass('col-lg-8').addClass('col-lg-6');
                    $('#div_estado_venta').removeClass('col-lg-4').addClass('col-lg-3');
                    //$('#div_observacion').toggleClass('pull-left');
                    //$('#inputCantidad').attr("disabled", true);
                    $('#div_cantidad').show();
                    $('#inputCantidad').val('0');
                    $('#div_equipoproducto').show();
                    $('#inputEquipoProducto').val(null);
                    $('#inputUgis').val(null);
                    $('#div_ugis').hide();
                    //$('#fecha_entrega_te').attr("readonly", false);
                    //$('#fecha_avance_oportunidad').attr("readonly", false);
                    //$('#estado_venta').attr("readonly", false);
                    $('#estado_venta').val("P");
                    $('#estado_venta').change();
                    //$('#observacion').attr("readonly", false);
                    $("#estadoLinea").find("option[value='R']").show();
                    $('#estadoLinea').selectpicker('refresh');
                    $('#div_inputNumerosLineasNuevas').show();
                    $('#div_fecha_activado').hide();
                    $('#div_operador').show();
                    //obtenerGetCantidadDeNumeros($('#inputNumerosLineasNuevas').val());
                } else if (tipoServicioName === 'Fija'){
                    //$('#sot').attr("disabled", false);
                    $('#div_sot').show();
                    $('#div_nro_proyecto').show();
                    $('#div_solicitud').hide();
                    //Porque se anula en los dos?
                    //$('#div_fecha_liquidado').hide();
                    $('#div_hora').show();
                    $('#div_observacion').removeClass('col-lg-6').addClass('col-lg-3');
                    $('#div_observacion').removeClass('col-lg-8').addClass('col-lg-3');
                    $('#div_estado_venta').removeClass('col-lg-4').addClass('col-lg-3');
                    //$('#inputCantidad').attr("disabled", false);
                    $('#div_cantidad').hide();
                    $('#inputCantidad').val('0');
                    $('#div_ugis').show();
                    $('#inputUgis').val('0');
                    $('#div_equipoproducto').show();
                    $('#inputEquipoProducto').val(null);
                    //$('#fecha_entrega_te').attr("readonly", true);
                    //$('#fecha_avance_oportunidad').attr("readonly", true);
                    //$('#estado_venta').attr('disabled',true);
                    $('#estado_venta').val('P');
                    $('#estado_venta').change();
                    //$('#observacion').attr("readonly", true);
                    $("#estadoLinea").find("option[value='R']").hide();
                    $('#estadoLinea').selectpicker('refresh');
                    $('#inputNumerosLineasNuevas').val('');
                    $('#div_inputNumerosLineasNuevas').hide();
                    $('#div_fecha_activado').show();
                    $('#div_operador').hide();
                }  else if (tipoServicioName === 'Internet Dedicado'){
                    $('#div_sot').show();
                    $('#div_nro_proyecto').show();
                    $('#div_solicitud').show();
                    //Porque se anula en los dos?
                    //$('#div_fecha_liquidado').hide();
                    $('#div_hora').show();
                    $('#div_observacion').removeClass('col-lg-6').addClass('col-lg-8');
                    $('#div_estado_venta').removeClass('col-lg-3').addClass('col-lg-4');
                    //$('#inputCantidad').attr("disabled", false);
                    $('#div_cantidad').show();
                    $('#inputCantidad').val('0');
                    $('#inputUgis').val(null);
                    $('#div_ugis').hide();
                    $('#div_equipoproducto').hide();
                    $('#inputEquipoProducto').val(null);
                    //$('#fecha_entrega_te').attr("readonly", true);
                    //$('#fecha_avance_oportunidad').attr("readonly", true);
                    //$('#estado_venta').attr('disabled',true);
                    $('#estado_venta').val('P');
                    $('#estado_venta').change();
                    //$('#observacion').attr("readonly", true);
                    $("#estadoLinea").find("option[value='R']").hide();
                    $('#estadoLinea').selectpicker('refresh');
                    $('#inputNumerosLineasNuevas').val('');
                    $('#div_inputNumerosLineasNuevas').hide();
                    $('#div_fecha_activado').show();
                    $('#div_operador').hide();
                }
                else{
                    $('#div_observacion').removeClass('col-lg-6').addClass('col-lg-3');
                }

            }
        });

        // seleccionar servicio
        $('#selectServicio').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            $("#selectPlan").val('default');
            $('#precioplan').val(0);
            $('#selectPlan').selectpicker('refresh');
            //Deshabilitar Operador si se elije Portabilidad
            const dataPlan = e.target.value.split('_'); // formato: Id, nombre, precio
            if(dataPlan[1] == 'Portabilidad'){
                $('#inputOperador').attr("readonly", false);
             //  $('#inputOperador').show();
                 $('#div_operador').show();
                $('#inputOperador').val('');
            }    else{
               $('#inputOperador').attr("readonly", true);
               // $('#inputOperador').hide();
                $('#div_operador').hide();
                $('#inputOperador').val('');
                $('#inputOperador').val(null);
            }
        });

        // seleccionar plan y mostrar su precio
        selectPlan.on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            const dataPlan = e.target.value.split('_') // formato: Id, nombre, precio
            $('#precioplan').val(dataPlan[2])
            var precio = parseFloat(dataPlan[2]);
            $('#precioplan').val((precio).toFixed(2))
            const tipoServicio = selectTipoServicio.value.split('_')
            if(tipoServicio[1]=='Fija'){
                $('#inputCantidad').val('1');
                //$('#inputCantidad').val(dataPlan[1])
                const cantPlanes = dataPlan[1].split('+').length
                $('#inputUgis').val(cantPlanes)
            }
        });

        // agregar detalle de venta a la lista
        btnAgregar.addEventListener('click', () => {
            if (!selectTipoServicio.value || !selectServicio.value || !selectPlan.val() || !estadoLinea.value) {
                alerta('Faltan datos en el detalle de venta a agregar')
                return Toast.fire({
                    icon: 'warning',
                    title: 'Faltan datos'
                })
            }
            //console.log(!inputEquipoProducto.value)
            // obtener la data
            const tipoServicio = selectTipoServicio.value.split('_') // formato: Id, nombre
            //if(tipoServicio[1] =='Móvil' && (!inputNumerosLineasNuevas.value || !inputEquipoProducto.value)){
            if(tipoServicio[1] =='Móvil' && (!inputEquipoProducto.value || !inputCantidad.value)){
                alerta('Faltan datos en el detalle de venta a agregar')
                return Toast.fire({
                    icon: 'warning',
                    title: 'Faltan datos'
                })
            };
            if(tipoServicio[1] =='Fija' && !inputEquipoProducto.value ){
                alerta('Faltan datos en el detalle de venta a agregar')
                return Toast.fire({
                    icon: 'warning',
                    title: 'Faltan datos'
                })
            };
            const servicio = selectServicio.value.split('_') // formato: Id, nombre, ID_TIPO_SERVICIO
            const plan = precioplan.value // formato: Id, nombre, precio, ID_TIPO_SERVICIO
            const nombreplan = selectPlan.val().split('_') // formato: Id, nombre, precio, ID_TIPO_SERVICIO
            const cantidad = inputCantidad.value
            const ugis = inputUgis.value
            const numerosLineasNuevas = inputNumerosLineasNuevas.value
            const equipoproducto = inputEquipoProducto.value
            const subtotal_igv = Number((plan * cantidad).toFixed(2))
            const subtotal_sin_igv = Number((subtotal_igv / IGV).toFixed(2))

            // obtener data de valores nulos
            const operador = inputOperador.value
            const estado_linea = estadoLinea.value.split('_') // formato: Id, nombre, ID_TIPO_SERVICIO
            const fechaactivado = fecha_activado.value
            //const fechaliquidado = fecha_liquidado.value
            //const status_100_por = inputStatus.value
            //const numero_proyecto = inputNumeroProyecto.value
            //const fechainstalacion = fecha_instalacion.value
            const horas = hora.value

            // mostrar en la tabla y en inputs ocultos para formar un array que luego se envie al hacer submit
            cont++
            cantDetallesVenta++
            total_igv = Number((total_igv + subtotal_igv).toFixed(2))
            total_sinigv = Number((total_igv / IGV).toFixed(2))

            let htmlNumerosLineaNueva = ''
            numerosLineasNuevas.split(',').map(num => {
                htmlNumerosLineaNueva += `
                    <span class="badge bg-secondary">
                        ${num.trim()}
                    </span>
                `
            })

            tbodyDetalleVenta.innerHTML += `
            <tr id="detalleventa_${cont}">
                <td width="20px">${cont}</td>
                <td>${tipoServicio[1]}</td>
                <td>${servicio[1]}</td>
                <td>${nombreplan[1]}</td>
                <td id="dv_precioplan">${plan}</td>
                <td id="dv_cantidad">${cantidad}</td>
                <td>${ugis}</td>
                <td>
                    ${htmlNumerosLineaNueva}
                </td>
                <td>${equipoproducto}</td>

                <td>${operador}</td>
                <td>${estado_linea[1]}</td>
                <td>${fechaactivado}</td>
                <td>${horas}</td>

                <td id="dv_subtotal_sin_igv">${subtotal_sin_igv}</td>
                <td id="dv_subtotal_igv">${subtotal_igv}</td>

                <td width="30px">
                    <button type="button" class="btn btn-sm btn-danger" onclick='handleDeleteDetalleVenta("detalleventa_${cont}", ${subtotal_igv}, ${subtotal_sin_igv})'>
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
                <input type="hidden" name="tiposServicio[]" value="${tipoServicio[0]}">
                <input type="hidden" name="servicios[]" value="${servicio[0]}">
                <input type="hidden" name="planes[]" value="${nombreplan[0]}">
                <input type="hidden" name="precioplanes[]" value="${plan}">
                <input type="hidden" name="cantidades[]" value="${cantidad}">
                <input type="hidden" name="ugises[]" value="${ugis}">
                <input type="hidden" name="numerosLineasNuevas[]" value="${numerosLineasNuevas}">
                <input type="hidden" name="equipoproducto[]" value="${equipoproducto}">

                <input type="hidden" name="operador[]" value="${operador}">
                <input type="hidden" name="estado_linea[]" value="${estado_linea[0]}">
                <input type="hidden" name="fechaactivado[]" value="${fechaactivado}">
                <input type="hidden" name="horas[]" value="${horas}">

                <input type="hidden" name="subtotales_sinigv[]" value="${subtotal_sin_igv}">
                <input type="hidden" name="subtotales_igv[]" value="${subtotal_igv}">

            </tr>`

            inputTotal.value = total_igv
            inputTotal_sin_igv.value = total_sinigv
            total.value = total_igv
            total_sin_igv.value = total_sinigv
            //limpiar inputs
            inputCantidad.value = '0'
            $('#precioplan').val(0)
            inputNumerosLineasNuevas.value = ''
            $('#inputEquipoProducto').val(null);
            $('#inputUgis').val('0');
            $("#selectServicio").val('default');
            $("#selectPlan").val('default');
            $("#estadolinea").val('default');
            $('#selectPlan').selectpicker('refresh');
            $('#selectServicio').selectpicker('refresh');
            $('#estadolinea').selectpicker('refresh');

            $("#inputOperador").val(null);
            $("#estadoLinea").val('default');
            $("#estadoLinea").change();
            $("#fecha_activado").val('default');
            $("#fecha_liquidado").val('default');
            //$("#inputStatus").val(null);
            //$("#inputNumeroProyecto").val(null);
            //$("#fecha_instalacion").val('default');
            $("#hora").val('default');

        })

        // calcular la cantidad a partir de la cantidad de numeros ingresados cuando es movil
        inputNumerosLineasNuevas.addEventListener('input', (e) => {
            obtenerGetCantidadDeNumeros(e.target.value)
        })

        function obtenerGetCantidadDeNumeros(valorInputNumeroLinea) {
            if (!valorInputNumeroLinea.trim()) return inputCantidad.val('0')
            const cantNumero = valorInputNumeroLinea.split(',').length
            $('#inputCantidad').val(cantNumero)
        }

        // eliminar un detalle de venta de la lista
        function handleDeleteDetalleVenta(idDetalleVenta, subtotal_igv, subtotal_sin_igv) {
            total_igv = Number((total_igv - subtotal_igv).toFixed(2))
            total_sinigv = Number((total_igv / IGV).toFixed(2))
            inputTotal.value = total_igv
            inputTotal_sin_igv.value = total_sinigv
            total.value = total_igv
            total_sin_igv.value = total_sinigv
            const item = document.getElementById(idDetalleVenta)
            tbodyDetalleVenta.removeChild(item)
            cantDetallesVenta--
        }

        //alerta
        function alerta(title = 'faltan datos') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            return Toast.fire({
                icon: 'warning',
                title
            })
        }

        const formCrearVenta = document.getElementById('formCrearVenta')
        formCrearVenta.addEventListener('submit', (e) => {
            e.preventDefault()
            //verificar los datos obligatorios
            const {
                tipo_contrato,
                bsd_personal_id,
                razon_social,
                sot,
                sec,
                salesforce,
                nro_oportunidad,
                observacion,
                estado_venta,
                avance_oportunidad,
                nro_proyecto,
                solicitud
            } = e.target

            if (!tipo_contrato.value || !tipo_contrato.value.trim()) return alerta(
                'El campo tipo contrato es obligatorio')

            if (tipo_contrato.value.length > 20) return alerta(
                'El campo tipo contrato no debe contener más de 20 caracteres')

            if (!salesforce.value) return alerta('El campo Salesforce es obligatorio')

            if (!nro_oportunidad.value) return alerta('El campo Nro. Oportunidad es obligatorio')

            if (nro_oportunidad.value.length > 18) return alerta(
                'El campo nro_oportunidad  acepta máximo 18 caracteres')

            if (!estado_venta.value) return alerta('El campo Estado Venta es obligatorio')

            if (!avance_oportunidad.value) return alerta('El campo Avance de Oportunidad es obligatorio')

            if (sot.value && isNaN(sot.value)) return alerta('El campo SOT debe ser un número')

            if (!sec.value || isNaN(sec.value)) return alerta('El campo SEC debe ser un número')

            if (isNaN(nro_proyecto.value)) return alerta('El campo Nro Proyecto debe ser un número')

            if (observacion.value.length > 350) return alerta(
                'El campo observaciones  acepta máximo 350 caracteres')

            if (!bsd_personal_id.value || !bsd_personal_id.value.trim()) return alerta('El Personal es obligatorio')

            if (!razon_social.value || !razon_social.value.trim()) return alerta('El Cliente es obligatorio')

            if (cantDetallesVenta === 0) return alerta('Detalles de venta es obligatorio')

            //$('#estado_venta').attr('disabled',false);

            formCrearVenta.submit()
        })
    </script>
@stop
