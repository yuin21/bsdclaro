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
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Datos generales</p>
                </div>
                <div class="card-body">
                    <div class="row mb-4 d-flex justify-content-around">
                        <div class="col-lg-2 col-sm-6" >
                            {!! Form::label('sec', 'SEC') !!}
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
                        <div class="col-lg-3 col-sm-6">
                            {!! Form::label('tipo_contrato', 'Tipo de Contrato') !!}
                            {!! Form::select('tipo_contrato', ['F' => 'Físico', 'V' => 'Virtual'],null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                            @error('tipo_contrato')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            {!! Form::label('salesforce', 'Salesforce') !!}
                            {!! Form::select('salesforce', ['S' => 'Si', 'N' => 'No'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                            @error('salesforce')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            {!! Form::label('nro_oportunidad', 'Nro. Oportunidad') !!}
                            {!! Form::text('nro_oportunidad', null, ['class' => 'form-control']) !!}
                            @error('nro_oportunidad')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            {!! Form::label('avance_oportunidad', 'Avance de Oport.') !!}
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
                                {!! Form::label('fecha_oportunidad_ganada', 'Fecha Avance Ganada', ['class' => 'text-nowrap']) !!}
                                {!! Form::date('fecha_oportunidad_ganada', null, ['class' => 'form-control', 'id' => 'fecha_oportunidad_ganada']) !!}
                                @error('fecha_oportunidad_ganada')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 ">
                            <div class="mb-2">
                                {!! Form::label('fecha_conforme', 'Fecha Conformidad', ['class' => 'text-nowrap']) !!}
                                {!! Form::date('fecha_conforme', null, ['class' => 'form-control', 'id' => 'fecha_conforme']) !!}
                                @error('fecha_conforme')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-3 col-sm-6" id="div_nro_proyecto">
                            {!! Form::label('nro_proyecto', 'Nro. Proyecto') !!}
                            {!! Form::text('nro_proyecto', null, ['class' => 'form-control']) !!}
                            @error('nro_proyecto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
                        <div class="col-lg-3 col-sm-6">
                            {!! Form::label('estado_venta', 'Estado de Expediente') !!}
                            {!! Form::select('estado_venta', ['P' => 'Pendiente', 'E' => 'Enviado', 'C' => 'Conforme', 'N' => 'No Conforme'], null, ['class' => 'selectpicker form-control', 'id' => 'estado_venta']) !!}
                            @error('estado_venta')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-6">
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
                                title="Seleccionar tipo de servicio">
                                @foreach ($tiposservicio as $tiposervicio)
                                    <option value="{{ $tiposervicio->id }}_{{ $tiposervicio->nom_tipo_servicio }}">
                                        {{ $tiposervicio->nom_tipo_servicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="selectServicio" id="selectServicio" class="selectpicker form-control"
                                title="Seleccionar servicio">
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
                                title="Seleccionar plan">
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
                                {!! Form::label('precioplan', 'Precio del plan', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('precioplan', 0, ['class' => 'form-control mt-2', 'id' => 'precioplan', 'placeholder' => 'precio plan']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('inputCantidad', 'Cantidad/Ugis', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('inputCantidad', 0, ['class' => 'form-control mt-2', 'id' => 'inputCantidad', 'placeholder' => 'cantidad', 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('inputNumerosLineasNuevas', 'Números de linea nueva', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('inputNumerosLineasNuevas', null, ['class' => 'form-control mt-2', 'id' => 'inputNumerosLineasNuevas', 'placeholder' => 'Números de Lineas nuevas']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('inputEquipoProducto', 'Equipo/Producto', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('inputEquipoProducto', null, ['class' => 'form-control mt-2', 'id' => 'inputEquipoProducto']) !!}
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('operador', 'Operador', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('operador', null, ['class' => 'form-control mt-2', 'id' => 'inputOperador']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('estado_linea', 'Estado de Linea', ['style' => 'margin: 0; min-width:180px']) !!}
                                {{-- {!! Form::select('estado_linea', ['A' => 'Activos','C' => 'Créditos','P'=>'Pendientes de Instalación'], null, ['class' => 'selectpicker form-control', 'id' => 'estadoLinea', 'title'=>'Seleccione']) !!}
                                 --}}
                                <select class="selectpicker form-control" name="estado_linea" title="Seleccione" id="estado_Linea">
                                    <option value="A">Activos</option>
                                    <option value="C">Créditos</option>
                                    <option value="P">Pendientes de Instalación</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('fecha_activado', 'Fecha Activado', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::date('fecha_activado', null, ['class' => 'form-control mt-2', 'id' => 'fecha_activado']) !!}
                            </div>
                         </div>
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('fecha_liquidado', 'Fecha Liquidado', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::date('fecha_liquidado', null, ['class' => 'form-control mt-2', 'id' => 'fecha_liquidado']) !!}
                            </div>
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('fecha_instalacion', 'Fecha Instalación', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::date('fecha_instalacion', null, ['class' => 'form-control mt-2', 'id' => 'fecha_instalacion']) !!}
                            </div>
                        </div>
                        <div class="col-6">
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
                                    <th>Cantidad/Ugis</th>
                                    <th>Números de linea nueva</th>
                                    <th>Equipo/Producto</th>
                                    <th>Total</th>
                                    <th>Sin IGV</th>
 
                                    <th>Operador</th>
                                    <th>Estado de Linea</th>
                                    <th>Fecha Activado</th>
                                    <th>Fecha Liquidado</th>
                                    <th>Fecha Instalacion</th>
                                    <th>Hora</th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbodyDetalleVenta">
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 d-flex justify-content-end align-items-center" style="gap: 10px;">
                        {!! Form::label('inputTotal_sin_igv', 'Sin IGV', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal_sin_igv', null, ['class' => 'form-control', 'id' => 'inputTotal_sin_igv', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
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
                                buscando SUNAT
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
    }
    #inputCantidad{
        text-align: right;
    }
    #precioplan{
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
        const inputNumerosLineasNuevas = document.getElementById('inputNumerosLineasNuevas')
        const inputEquipoProducto = document.getElementById('inputEquipoProducto')
        const btnAgregar = document.getElementById('btnAgregar')
        const tbodyDetalleVenta = document.getElementById('tbodyDetalleVenta')
        const inputTotal = document.getElementById('inputTotal')
        const inputTotal_sin_igv = document.getElementById('inputTotal_sin_igv')
        const total = document.getElementById('total') // input hidden para mandar a registrar
        //Agregar data de valores nulos          
        const inputOperador = document.getElementById('inputOperador')
        const estadoLinea = document.getElementById('estadoLinea')
        const fecha_activado = document.getElementById('fecha_activado')
        const fecha_liquidado = document.getElementById('fecha_liquidado')
        //const inputStatus = document.getElementById('inputStatus')
        //const inputNumeroProyecto = document.getElementById('inputNumeroProyecto')
        const fecha_instalacion = document.getElementById('fecha_instalacion')
        const hora = document.getElementById('hora')

        let cantDetallesVenta = 0 // parecido al cont
        let cont = 0 // el cont sirve para manejar un id diferente de cada detalle venta para eliminarlo
        let total_igv = 0
        let total_sin_igv = 0
        const IGV = 1.18

        // fecha actual en input 
        // const fecha = new Date();
        // $('#fecha_entrega_te').val(fecha.toJSON().slice(0, 10))

        //desabilitar select servicio y plan al iniciar
        $('#selectPlan').prop('disabled', true);
        $('#selectServicio').prop('disabled', true);
        $('#selectPlan').selectpicker('refresh');
        $('#selectServicio').selectpicker('refresh');

        // $('#prepend').on('click', function () {
        //     let $lider_list = $('#estadoLinea option');

        //     $('#estadoLinea').prepend($('<option />', {
        //         text: 'I: Líder ' + ($lider_list.length + 1),
        //         value: $lider_list.length + 1,
        //     }));
        // });

        // habilitar select servicio y plan cuando se elige un tipo de servicio
        $('#selectTipoServicio').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            if (isSelected) {
                const [tipoServicioID, tipoServicioName] = e.target.value.split(
                    '_') // formato tipo servicio: ID, NOMBRE

                // habilitar los select
                $('#selectPlan').prop('disabled', false);
                $('#selectServicio').prop('disabled', false);

                // filtrar select servicio
                $("#selectServicio").val('default');
                $.map($("#selectServicio option"), function(option) {
                    const value = option.value
                    if (value) {
                        const servicio = value.split('_') // formato servicio: ID , NOMBRE, ID_TIPO_SERVICIO
                        const helper = "#selectServicio option[value=" + value + "]"
                        if (tipoServicioID !== servicio[2]) {
                            $("#selectServicio option[value=" + value + "]").hide()
                        } else {
                            $("#selectServicio option[value=" + value + "]").show()
                        }
                    }
                    return option;
                })
                // filtrar select plan
                $("#selectPlan").val('default');
                $.map($("#selectPlan option"), function(option) {
                    const value = option.value
                    if (value) {
                        const plan = value.split(
                            '_') // formato plan: Id, nombre, precio, ID_TIPO_SERVICIO
                        const helper = "#selectPlan option[value=" + value + "]"
                        if (tipoServicioID !== plan[3]) {
                            $(`#selectPlan option[value='${value}']`).hide()
                        } else {
                            $(`#selectPlan option[value='${value}']`).show()
                        }
                    }
                    return option;
                })

                // filtrar select servicio
                $("#estado_Linea").val('default');
                // $.map($("#estado_Linea option"), function(option) {
                //     const value = option.value
                //     if (value) {
                //         //const estadoLinea = value.split('_') // formato servicio: ID , NOMBRE, ID_TIPO_SERVICIO
                //         if (tipoServicioName == 'Móvil' && value == 'P') {
                //             $(`#estado_Linea option[value='${value}']`).hide()
                //         } else {
                //             $(`#estado_Linea option[value='${value}']`).show()
                //         }
                //     }
                //     return option;
                // })
                $('#precioplan').val(0)
                $('#selectPlan').selectpicker('refresh');
                $('#selectServicio').selectpicker('refresh');
                //$('#estado_Linea').selectpicker('refresh');
    
                //deshabilitar y limpiar campos cuando se elija el tipo de servicio movil
                if (tipoServicioName === 'Móvil') {
                    //$('#sot').val(null);
                    //$('#sot').attr("disabled", true);
                    //$('#estado_Linea').append('<option value="o" selected="selected">Opción</option>');  
                    $("#estado_Linea").find("option[value='P']").hide();
                    $('#estado_Linea').selectpicker('refresh');
                    //$("#estado_Linea").children().remove().end().append('<option selected value="whatever">text</option>');
                    //Resetear y poblar.
                    //$("#estado_Linea").empty();
                    //$('#estado_Linea').prop('selectedIndex',0);
                    //$('#estado_Linea')[0].options.length = 0;

                    $('#div_sot').hide();
                    $('#div_nro_proyecto').hide();
                    $('#inputCantidad').attr("disabled", true);
                    $('#inputCantidad').val('0');
                    $('#inputEquipoProducto').val(null);
                    $('#fecha_entrega_te').attr("readonly", false);
                    $('#fecha_avance_oportunidad').attr("readonly", false);
                    $('#estado_venta').attr("readonly", false);  
                    $('#estado_venta').val("P");
                    $('#estado_venta').change();                  
                    $('#observacion').attr("readonly", false);  
                    //$('#inputOperador').append('<option value="d">ddd</option>'); 
                    obtenerGetCantidadDeNumeros($('#inputNumerosLineasNuevas').val());
                } else {
                    //$('#sot').attr("disabled", false);
                    $('#div_sot').show();
                    $('#div_nro_proyecto').show();
                    $('#inputCantidad').attr("disabled", false);
                    $('#inputCantidad').val('0');
                    $('#inputEquipoProducto').val(null);
                    $('#fecha_entrega_te').attr("readonly", true);
                    $('#fecha_avance_oportunidad').attr("readonly", true);
                    $('#estado_venta').attr('disabled',true);
                    $('#estado_venta').val('P');
                    $('#estado_venta').change();                    
                    $('#observacion').attr("readonly", true);
                    //$('#inputOperador').selectmenu("refresh");
                    $("#estado_Linea").find("option[value='P']").show();
                    $('#estado_Linea').selectpicker('refresh'); 
                    //$('#estadoLinea').val("C");
                    //$('#estadoLinea').change();  
                    $('#inputNumerosLineasNuevas').val(null);
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
            }    else{
                $('#inputOperador').attr("readonly", true);
                $('#inputOperador').val('');   
                $('#inputOperador').val(null);   
            }        
        });

        // seleccionar plan y mostrar su precio
        selectPlan.on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            const dataPlan = e.target.value.split('_') // formato: Id, nombre, precio 
            $('#precioplan').val(dataPlan[2])
        });

        // agregar detalle de venta a la lista
        btnAgregar.addEventListener('click', () => {

            if (!selectTipoServicio.value || !selectServicio.value || !selectPlan.val() || !inputCantidad.value || !
                inputNumerosLineasNuevas.value || !inputEquipoProducto.value) {
                alerta('Faltan datos en el detalle de venta a agregar')
                return Toast.fire({
                    icon: 'warning',
                    title: 'Faltan datos'
                })
            }

            // obtener la data
            const tipoServicio = selectTipoServicio.value.split('_') // formato: Id, nombre
            const servicio = selectServicio.value.split('_') // formato: Id, nombre, ID_TIPO_SERVICIO
            const plan = selectPlan.val().split('_') // formato: Id, nombre, precio, ID_TIPO_SERVICIO
            const cantidad = inputCantidad.value
            const numerosLineasNuevas = inputNumerosLineasNuevas.value
            const equipoproducto = inputEquipoProducto.value
            const subtotal_igv = Number((plan[2] * cantidad).toFixed(2))
            const subtotal_sin_igv = Number((subtotal_igv / IGV).toFixed(2))
            // obtener data de valores nulos            
            const operador = inputOperador.value
            const estado_linea = estadoLinea.value.split('_')
            const fechaactivado = fecha_activado.value
            const fechaliquidado = fecha_liquidado.value
            //const status_100_por = inputStatus.value
            //const numero_proyecto = inputNumeroProyecto.value
            const fechainstalacion = fecha_instalacion.value
            const horas = hora.value

            // mostrar en la tabla y en inputs ocultos para formar un array que luego se envie al hacer submit
            cont++
            cantDetallesVenta++
            total_igv = Number((total_igv + subtotal_igv).toFixed(2))
            total_sin_igv = Number((total_igv / IGV).toFixed(2))

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
                <td>${plan[1]}</td>
                <td>${plan[2]}</td>
                <td>${cantidad}</td>
                <td>
                    ${htmlNumerosLineaNueva}
                </td>
                <td>${equipoproducto}</td>
                <td>${subtotal_igv}</td>
                <td>${subtotal_sin_igv}</td>
   
                <td>${operador}</td> 
                <td>${estado_linea}</td> 
                <td>${fechaactivado}</td> 
                <td>${fechaliquidado}</td> 
                <td>${fechainstalacion}</td>   
                <td>${horas}</td>     

                <td width="30px">
                    <button type="button" class="btn btn-sm btn-danger" onclick='handleDeleteDetalleVenta("detalleventa_${cont}", ${subtotal_igv}, ${subtotal_sin_igv})'>
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
                <input type="hidden" name="tiposServicio[]" value="${tipoServicio[0]}">
                <input type="hidden" name="servicios[]" value="${servicio[0]}">
                <input type="hidden" name="planes[]" value="${plan[0]}">
                <input type="hidden" name="precioplanes[]" value="${plan[2]}">
                <input type="hidden" name="cantidades[]" value="${cantidad}">
                <input type="hidden" name="numerosLineasNuevas[]" value="${numerosLineasNuevas}">
                <input type="hidden" name="equipoproducto[]" value="${equipoproducto}">
                <input type="hidden" name="subtotales_igv[]" value="${subtotal_igv}">
                <input type="hidden" name="subtotales_sinigv[]" value="${subtotal_sin_igv}">  

                <input type="hidden" name="operador[]" value="${operador}">
                <input type="hidden" name="estado_linea[]" value="${estado_linea}">
                <input type="hidden" name="fechaactivado[]" value="${fechaactivado}">
                <input type="hidden" name="fechaliquidado[]" value="${fechaliquidado}">
                <input type="hidden" name="fechainstalacion[]" value="${fechainstalacion}">
                <input type="hidden" name="horas[]" value="${horas}">

            </tr>`

            inputTotal.value = total_igv
            inputTotal_sin_igv.value = total_sin_igv
            total.value = total_igv
            //limpiar inputs
            inputCantidad.value = '0'
            $('#precioplan').val(0)
            inputNumerosLineasNuevas.value = ''
            $('#inputEquipoProducto').val(null);
            $("#selectServicio").val('default');
            $("#selectPlan").val('default');
            $('#selectPlan').selectpicker('refresh');
            $('#selectServicio').selectpicker('refresh');

            $("#inputOperador").val(null);
            $("#estadoLinea").val('A');
            $("#fecha_activado").val('default');
            $("#fecha_liquidado").val('default');
            //$("#inputStatus").val(null);
            //$("#inputNumeroProyecto").val(null);
            $("#fecha_instalacion").val('default');
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
            total_sin_igv = Number((total_igv / IGV).toFixed(2))
            inputTotal.value = total_igv
            inputTotal_sin_igv.value = total_sin_igv
            total.value = total_igv
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
                nro_proyecto
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

            $('#estado_venta').attr('disabled',false);

            formCrearVenta.submit()
        })
    </script>
@stop
