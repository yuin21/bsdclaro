@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Pagos
    </a>
    <h1 class="text-bold">Registrar Pago</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.ventas.store', 'id' => 'formCrearVenta']) !!}
    
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card col-lg-4">
                    <div class="card-header row">
                        <div class="col-lg-6 col-sm-6" > 
                            <div class="h5 text-bold" id='buscar_p'>Buscar Personal</div>
                        </div> 
                        <div class="col-lg-6 col-sm-6" >                      
                            {!! Form::date('fecha_actual', null, ['class' => 'form-control mt-2', 'id' => 'fecha_actual']) !!}
                        </div>
                    </div>
                    <div class="card-body col-lg-12">
                        <div class="form-group">
                            {!! Form::label('searchPersonal', 'Apellidos y nombre') !!}
                            {!! Form::hidden('bsd_personal_id', null, ['id' => 'bsd_personal_id']) !!}
                            <div class="input-group">
                                {!! Form::text('searchPersonal', null, ['class' => 'form-control', 'id' => 'searchPersonal']) !!}
                                <button type="button" id="btnSearchVenta" class="btn btn-outline-secondary"
                                        style="border-radius: 0 3px 3px 0; opacity: 0.6"><i class="fas fa-search"></i></button>
                            </div>
                            {{-- <div class="input-group mt-2">
                                <span class="input-group-text">cargo</span>
                                {!! Form::text('personal_cargo', null, ['class' => 'form-control', 'id' => 'personal_cargo', 'readonly']) !!}
                            </div> --}}
                            @error('bsd_personal_id')
                                <small class="text-danger">El personal es obligatorio</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card col-lg-8">
                    <div class="card-header row">
                        <div class="col-lg-6 col-sm-6" > 
                            <div class="h5 text-bold" id='buscar_p'>Datos generales</div>
                        </div> 
                        <div class="col-lg-6 col-sm-6" >                      
                            {!! Form::hidden('aux', null, ['class' => 'form-control mt-2', 'id' => 'aux']) !!}
                        </div>
                    </div> 
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('porcentaje_comision', '% Comision') !!}
                                {!! Form::select('porcentaje_comision', ['70' => '70 %', '80' => '80 %', '90' => '90 %', '100' => '100 %'],null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                                @error('porcentaje_comision')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('comision_consultor', 'Comisión Consultor') !!}
                                {!! Form::text('comision_consultor', null, ['class' => 'form-control']) !!}
                                @error('comision_consultor')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('estado_carpeta', 'Estado Carpeta') !!}
                                {!! Form::select('estado_carpeta', ['C' => 'Conforme', 'N' => 'No Conforme'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                                @error('estado_carpeta')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('pago_1er_recibo', 'Pago 1er Recibo') !!}
                                {!! Form::select('pago_1er_recibo', ['S' => 'Si', 'N' => 'No'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                                @error('pago_1er_recibo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('pago_dace', 'Pago Dace') !!}
                                {!! Form::select('pago_dace', ['S' => 'Si', 'N' => 'No'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                                @error('pago_dace')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('abono_consultor', 'Abono Consultor') !!}
                                {!! Form::select('abono_consultor', ['S' => 'Si', 'N' => 'No'], null, ['class' => 'selectpicker form-control', 'title'=>'Seleccione']) !!}
                                @error('abono_consultor')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('porcentaje_cump_dic', '% Cump Dic') !!}
                                {!! Form::text('porcentaje_cump_dic', null, ['class' => 'form-control']) !!}
                                @error('porcentaje_cump_dic')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('sum_total_ventas', 'Suma Total Ventas') !!}
                                {!! Form::text('sum_total_ventas', null, ['class' => 'form-control']) !!}
                                @error('sum_total_ventas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('sum_renta_total_ventas', 'Suma Renta Total Ventas') !!}
                                {!! Form::text('sum_renta_total_ventas', null, ['class' => 'form-control']) !!}
                                @error('sum_renta_total_ventas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('sum_comision_bruta_dace', 'Comision Bruta Dace') !!}
                                {!! Form::text('sum_comision_bruta_dace', null, ['class' => 'form-control']) !!}
                                @error('sum_comision_bruta_dace')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Ventas</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table_venta">
                            <thead class="border">
                                <tr>
                                    <th>Item</th>
                                    <th>Cliente</th>
                                    <th>RUC</th>
                                    <th>Estado</th>
                                    <th>SEC</th>
                                    <th>Sin IGV</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_venta">
                                {{-- @foreach ($ventas as $venta)
                                    <tr>
                                        <td width="20px">{{ $loop->iteration }}</td>
                                        <td>{{ $venta->personal->nom_personal }} {{ $venta->personal->ape_paterno }}</td>
                                        <td>{{ $venta->cliente->razon_social }}</td>
                                        <td>{{ $venta->cliente->ruc }}</td>
                                        <td>{{ $venta->getEstado_Venta() }}</td>
                                        <td>{{ round($venta->total / 1.18, 2) }}</td>
                                        <td>{{ number_format($venta->total, 2) }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalle de Ventas</p>
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
                                    <th>Cantidad/UGIS</th>
                                    <th>Números de linea nueva</th>
                                    <th>Estado de Linea</th>
                                    <th>Fecha de Activado</th>
                                    <th>Sin IGV</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_detalle_venta">
                                {{-- @foreach ($ventas as $venta)
                                    <tr>
                                        <td width="20px">{{ $loop->iteration }}</td>
                                        <td>{{ $venta->personal->nom_personal }} {{ $venta->personal->ape_paterno }}</td>
                                        <td>{{ $venta->cliente->razon_social }}</td>
                                        <td>{{ $venta->cliente->ruc }}</td>
                                        <td>{{ $venta->getEstado_Venta() }}</td>
                                        <td>{{ round($venta->total / 1.18, 2) }}</td>
                                        <td>{{ number_format($venta->total, 2) }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalles de Pago</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('bsd_detalle_venta_id', 'Detalle Venta', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('bsd_detalle_venta_id', null, ['class' => 'form-control mt-2']) !!}
                            </div>
                        </div> --}}
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('cuota', 'Cuota', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('cuota', null, ['class' => 'form-control mt-2', 'id' => 'cuota']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('comision_consultor', 'Comision Consultor', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('comision_consultor', null, ['class' => 'form-control mt-2', 'id' => 'inputEquipoProducto']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('sub_total', 'Sub Total', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('sub_total', null, ['class' => 'form-control mt-2', 'id' => 'inputOperador']) !!}
                            </div>
                        </div>
                    </div>                    
                    {!! Form::button('Agregar', ['class' => 'btn btn-success btn-sm mt-2', 'id' => 'btnAgregar']) !!}
                </div>
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
    #buscar_p{
        margin-top: 15px;
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
                //$('#personal_cargo').val(selected.item.cargo);
            }
        })

        // busqueda de venta

        $(document).ready(function() {
            $('#btnSearchVenta').click(function(e) {
                handleSearchVenta()
            })
            $("#searchPersonal").keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13) {
                    e.preventDefault();
                    handleSearchVenta()
               }
            });
        });

        function handleSearchVenta() {
            $.ajax({
                type: 'GET',
                url: '{{ route('api.ventas.search') }}',
                data: {
                    term: $("#bsd_personal_id").val(),
                    fech: $("#fecha_actual").val()
                },
                success: function(response) {
                    $("#tbody_venta").html("");
                    for(var i=0; i<response.length; i++){
                        var tr = `<tr>
                        <td>`+(i + 1)+`</td>
                        <td>`+response[i][i].razonsocial+`</td>
                        <td>`+response[i][i].ruc+`</td>
                        <td>`+response[i][i].estadoventa+`</td>
                        <td>`+response[i][i].sec+`</td>
                        <td>`+response[i][i].total_sin_igv+`</td>
                        <td>`+response[i][i].total+`</td>
                        <td class="td_id_venta" style="display:none;">`+response[i][i].id+`</td>
                        </tr>`;
                        $("#tbody_venta").append(tr)
                    }
                },
                error: function(response) {
                    $("#tbody_venta").html("");
                    for(var i=0; i<response.length; i++){
                        var tr = `<tr>
                        <td>`+(i + 1)+`</td>
                        <td>`+response[i][i].razonsocial+`</td>
                        <td>`+response[i][i].ruc+`</td>
                        <td>`+response[i][i].estadoventa+`</td>
                        <td>`+response[i][i].sec+`</td>
                        <td>`+response[i][i].total_sin_igv+`</td>
                        <td>`+response[i][i].total+`</td>
                        <td class="td_id_venta" style="display:none;">`+response[i][i].id+`</td>
                        </tr>`;
                        $("#tbody_venta").append(tr)
                    }
                }
            });
        } 
        // busqueda de venta
        $(document).ready(function() {
            $(document).on("click", "#table_venta tbody tr", function() {
                var data = $(this).find(".td_id_venta").html();
                $("#cuota").val(data)
                handleSearchDetalleVenta()
            });
        });     

        function handleSearchDetalleVenta() {
            $.ajax({
                type: 'GET',
                url: '{{ route('api.detallesventas.search') }}',
                data: {
                    term: $("#cuota").val(),
                },
                success: function(response) {
                    $("#tbody_detalle_venta").html("");
                    for(var i=0; i<response.length; i++){
                        var tr = `<tr>
                        <td>`+(i + 1)+`</td>
                        <td>`+response[i][i].tiposervicio+`</td>
                        <td>`+response[i][i].servicio+`</td>
                        <td>`+response[i][i].plan+`</td>
                        <td>`+response[i][i].precioplan+`</td>
                        <td>`+response[i][i].cantidad+`</td>
                        <td>`+response[i][i].numerolineanueva+`</td>
                        <td>`+response[i][i].estadolinea+`</td>
                        <td>`+response[i][i].fechaactivado+`</td>
                        <td>`+response[i][i].cf_sin_igv+`</td>
                        <td>`+response[i][i].cf_con_igv+`</td>
                        <td class="td_id_venta" style="display:none;">`+response[i][i].id+`</td>
                        </tr>`;
                        $("#tbody_detalle_venta").append(tr)
                    }
                },
                error: function(response) {
                    $("#tbody_detalle_venta").html("");
                    for(var i=0; i<response.length; i++){
                        var tr = `<tr>
                        <td>`+(i + 1)+`</td>
                        <td>`+response[i][i].tiposervicio+`</td>
                        <td>`+response[i][i].servicio+`</td>
                        <td>`+response[i][i].plan+`</td>
                        <td>`+response[i][i].precioplan+`</td>
                        <td>`+response[i][i].cantidad+`</td>
                        <td>`+response[i][i].numerolineanueva+`</td>
                        <td>`+response[i][i].estadolinea+`</td>
                        <td>`+response[i][i].fechaactivado+`</td>
                        <td>`+response[i][i].cf_sin_igv+`</td>
                        <td>`+response[i][i].cf_con_igv+`</td>
                        <td class="td_id_venta" style="display:none;">`+response[i][i].id+`</td>
                        </tr>`;
                        $("#tbody_detalle_venta").append(tr)
                    }
                }
            });
        }
        
    </script>
    <script>
        // const selectTipoServicio = document.getElementById('selectTipoServicio')
        // const selectServicio = document.getElementById('selectServicio')
        // const selectPlan = $('#selectPlan')
        // const inputCantidad = document.getElementById('inputCantidad')
        // const inputNumerosLineasNuevas = document.getElementById('inputNumerosLineasNuevas')
        // const inputEquipoProducto = document.getElementById('inputEquipoProducto')
        // const btnAgregar = document.getElementById('btnAgregar')
        // const tbodyDetalleVenta = document.getElementById('tbodyDetalleVenta')
        // const inputTotal = document.getElementById('inputTotal')
        // const inputTotal_sin_igv = document.getElementById('inputTotal_sin_igv')
        // const total = document.getElementById('total') // input hidden para mandar a registrar
        // //Agregar data de valores nulos          
        // const inputOperador = document.getElementById('inputOperador')
        // const estadoLinea = document.getElementById('estadoLinea')
        // const fecha_activado = document.getElementById('fecha_activado')
        // const fecha_liquidado = document.getElementById('fecha_liquidado')
        // //const inputStatus = document.getElementById('inputStatus')
        // //const inputNumeroProyecto = document.getElementById('inputNumeroProyecto')
        // const fecha_instalacion = document.getElementById('fecha_instalacion')
        // const hora = document.getElementById('hora')

        // let cantDetallesVenta = 0 // parecido al cont
        // let cont = 0 // el cont sirve para manejar un id diferente de cada detalle venta para eliminarlo
        // let total_igv = 0
        // let total_sin_igv = 0
        // const IGV = 1.18

        //fecha actual en input 
        const fecha = new Date();
        $('#fecha_actual').val(fecha.toJSON().slice(0, 10))
        

        //desabilitar select servicio y plan al iniciar
        $('#selectPlan').prop('disabled', true);
        $('#selectServicio').prop('disabled', true);
        $('#selectPlan').selectpicker('refresh');
        $('#selectServicio').selectpicker('refresh');

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
                $('#precioplan').val(0)
                $('#selectPlan').selectpicker('refresh');
                $('#selectServicio').selectpicker('refresh');
                //Acomodar los campos
                $('#div_venta').addClass('d-flex justify-content-around');
                //deshabilitar y limpiar campos cuando se elija el tipo de servicio movil
                if (tipoServicioName === 'Móvil') {
                    //$('#sot').val(null);
                    //$('#sot').attr("disabled", true);
                    $('#div_sot').hide();
                    $('#div_nro_proyecto').hide();
                    $('#div_fecha_liquidado').hide();
                    $('#div_hora').hide();
                    $('#div_observacion').removeClass('col-lg-3').addClass('col-lg-6');
                    //$('#div_observacion').toggleClass('pull-left');
                    $('#inputCantidad').attr("disabled", true);
                    $('#inputCantidad').val('0');
                    $('#inputEquipoProducto').val(null);
                    $('#fecha_entrega_te').attr("readonly", false);
                    $('#fecha_avance_oportunidad').attr("readonly", false);
                    $('#estado_venta').attr("readonly", false);  
                    $('#estado_venta').val("P");
                    $('#estado_venta').change();                  
                    $('#observacion').attr("readonly", false);  
                    //$("#estadoLinea").find("option[value='P']").hide();
                    //$('#estadoLinea').selectpicker('refresh');
                    obtenerGetCantidadDeNumeros($('#inputNumerosLineasNuevas').val());
                } else if (tipoServicioName === 'Fija'){
                    //$('#sot').attr("disabled", false);
                    $('#div_sot').show();
                    $('#div_nro_proyecto').show();
                    $('#div_fecha_liquidado').show();
                    $('#div_hora').show();
                    $('#div_observacion').removeClass('col-lg-6').addClass('col-lg-3');
                    $('#inputCantidad').attr("disabled", false);
                    $('#inputCantidad').val('0');
                    $('#inputEquipoProducto').val(null);
                    $('#fecha_entrega_te').attr("readonly", true);
                    $('#fecha_avance_oportunidad').attr("readonly", true);
                    $('#estado_venta').attr('disabled',true);
                    $('#estado_venta').val('P');
                    $('#estado_venta').change();                    
                    $('#observacion').attr("readonly", true);
                    //$("#estadoLinea").find("option[value='P']").show();
                    //$('#estadoLinea').selectpicker('refresh'); 
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
            //const fechainstalacion = fecha_instalacion.value
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
                <td id="dv_precioplan">${plan[2]}</td>
                <td id="dv_cantidad">${cantidad}</td>
                <td>
                    ${htmlNumerosLineaNueva}
                </td>
                <td>${equipoproducto}</td>
   
                <td>${operador}</td> 
                <td>${estado_linea}</td> 
                <td>${fechaactivado}</td> 
                <td>${fechaliquidado}</td>  
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
                <input type="hidden" name="planes[]" value="${plan[0]}">
                <input type="hidden" name="precioplanes[]" value="${plan[2]}">
                <input type="hidden" name="cantidades[]" value="${cantidad}">
                <input type="hidden" name="numerosLineasNuevas[]" value="${numerosLineasNuevas}">
                <input type="hidden" name="equipoproducto[]" value="${equipoproducto}">

                <input type="hidden" name="operador[]" value="${operador}">
                <input type="hidden" name="estado_linea[]" value="${estado_linea}">
                <input type="hidden" name="fechaactivado[]" value="${fechaactivado}">
                <input type="hidden" name="fechaliquidado[]" value="${fechaliquidado}">
                <input type="hidden" name="horas[]" value="${horas}">
                
                <input type="hidden" name="subtotales_sinigv[]" value="${subtotal_sin_igv}"> 
                <input type="hidden" name="subtotales_igv[]" value="${subtotal_igv}"> 

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
            $("#estadoLinea").val('default');
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
