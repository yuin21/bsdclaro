@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de Pagos
    </a>
    <h1 class="text-bold">Registrar Pago</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.pagos.store', 'id' => 'formCrearPago']) !!}

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
                            {!! Form::hidden('mes', null, ['id' => 'mes']) !!}
                            {!! Form::hidden('año', null, ['id' => 'año']) !!}
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
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('factor', 'Factor') !!}
                                {!! Form::text('factor', null, ['class' => 'form-control']) !!}
                                @error('factor')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                {!! Form::label('comision_dace', 'Comisión Dace') !!}
                                {!! Form::text('comision_dace', null, ['class' => 'form-control']) !!}
                                @error('comision_dace')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
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
                        {!! Form::hidden('bsd_venta_id', null, ['id' => 'bsd_venta_id']) !!}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalle de Ventas</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table_detalle_venta">
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
                        {!! Form::hidden('bsd_detalle_venta_id', null, ['id' => 'bsd_detalle_venta_id']) !!}
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
                        <div class="col-4">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('cuota', 'Cuota', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('cuota', null, ['class' => 'form-control mt-2', 'id' => 'cuota']) !!}
                                {!! Form::hidden('bsd_cuota_personal_id', null, ['id' => 'bsd_cuota_personal_id']) !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('comision_consultor2', 'Comision Consultor', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('comision_consultor2', null, ['class' => 'form-control mt-2', 'id' => 'ComisionConsultor']) !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                                {!! Form::label('sub_total', 'Sub Total', ['style' => 'margin: 0; min-width:180px']) !!}
                                {!! Form::text('sub_total', null, ['class' => 'form-control mt-2', 'id' => 'SubTotal']) !!}
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
                                    <th>Cliente</th>
                                    <th>Cuota</th>
                                    <th>Comision Consultor</th>
                                    <th>Sub Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody_detalle_pago">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pb-4">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-danger btn-lg ml-1">Cancelar</a>
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
            $("#btnSearchVenta").keypress(function(e) {
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

        var ultimaFila = null;
        var colorOriginal;
        // busqueda de venta
        $(document).ready(function() {
            $(document).on("click", "#table_venta tbody tr", function() {
                var data = $(this).find(".td_id_venta").html();
                $("#bsd_venta_id").val(data)
                handleSearchDetalleVenta()
                //Pintar la fila seleccionada
                if (ultimaFila != null) {
                    ultimaFila.css('background-color', colorOriginal)
                }
                colorOriginal = $(this).css('background-color');
                $(this).css('background-color', 'aquamarine');
                ultimaFila = $(this);
            });
        });

        function handleSearchDetalleVenta() {
            $.ajax({
                type: 'GET',
                url: '{{ route('api.detallesventas.search') }}',
                data: {
                    term: $("#bsd_venta_id").val(),
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
                        <td class="td_id_detalle_venta" style="display:none;">`+response[i][i].id+`</td>
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
                        <td class="td_id_detalle_venta" style="display:none;">`+response[i][i].id+`</td>
                        </tr>`;
                        $("#tbody_detalle_venta").append(tr)
                    }
                }
            });
        }
        var ultimaFila2 = null;
        var colorOriginal2;
        // busqueda de detalle venta
        $(document).ready(function() {
            $(document).on("click", "#table_detalle_venta tbody tr", function() {
                var data = $(this).find(".td_id_detalle_venta").html();
                $("#bsd_detalle_venta_id").val(data)
                //Pintar la fila seleccionada
                if (ultimaFila2 != null) {
                    ultimaFila2.css('background-color', colorOriginal2)
                }
                colorOriginal2 = $(this).css('background-color');
                $(this).css('background-color', 'aquamarine');
                ultimaFila2 = $(this);
            });
        });

        // busqueda de cuentas

        $(document).ready(function() {
            $('#btnSearchVenta').click(function(e) {
                handleSearchCuotas()
            })
            $("#btnSearchVenta").keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13) {
                    e.preventDefault();
                    handleSearchCuotas()
               }
            });
        });

        function handleSearchCuotas() {
            $.ajax({
                type: 'GET',
                url: '{{ route('api.cuotapersonal.search') }}',
                data: {
                    per: $("#bsd_personal_id").val(),
                    mes: $("#mes").val(),
                    año: $("#año").val()
                },
                success: function(response) {
                    if (response && response.length > 0) {
                        $('#cuota').val(response[0].cuota);
                        $('#bsd_cuota_personal_id').val(response[0].id)
                    } else {
                        $('#cuota').val('');
                        $('#bsd_cuota_personal_id').val('')
                    }
                },
                error: function(response) {
                    $('#cuota').val('');
                    $('#bsd_cuota_personal_id').val('')
                }
            });
        }

    </script>
    <script>
        const cuota = document.getElementById('cuota')
        const ComisionConsultor = document.getElementById('ComisionConsultor')
        const SubTotal = document.getElementById('SubTotal')
        const btnAgregar = document.getElementById('btnAgregar')
        const tbodyDetallePago = document.getElementById('tbody_detalle_pago')
        const DetalleVentaID = document.getElementById('bsd_detalle_venta_id')
        const CuotaPersonalID = document.getElementById('bsd_cuota_personal_id')
        // const inputTotal = document.getElementById('inputTotal')

        let cantDetallesPago = 0 // parecido al cont
        let cont = 0 // el cont sirve para manejar un id diferente de cada detalle venta para eliminarlo

        //fecha actual en input
        const fecha = new Date();
        $('#fecha_actual').val(fecha.toJSON().slice(0, 10))
        const mes = fecha.toLocaleString('default', { month: 'long' })
        $('#mes').val(mes)
        const año = fecha.getFullYear()
        $('#año').val(año)

        $('#cuota').attr("readonly", true);

        // agregar detalle de venta a la lista
        btnAgregar.addEventListener('click', () => {

            if (!cuota.value || !ComisionConsultor.value || !SubTotal.value || !DetalleVentaID.value) {
                alerta('Faltan datos en el detalle de pago a agregar')
                return Toast.fire({
                    icon: 'warning',
                    title: 'Faltan datos'
                })
            }

            // obtener la data
            const cuotas = cuota.value
            const ComisionConsultores = ComisionConsultor.value
            const SubTotales = SubTotal.value
            const DetallesVentaID = DetalleVentaID.value
            const CuotasPersonalID = CuotaPersonalID.value
            // mostrar en la tabla y en inputs ocultos para formar un array que luego se envie al hacer submit
            cont++
            cantDetallesPago++

            tbodyDetallePago.innerHTML += `
            <tr id="detallepago_${cont}">
                <td width="20px">${cont}</td>
                <td>${DetallesVentaID}</td>
                <td>${cuotas}</td>

                <td>${ComisionConsultores}</td>
                <td>${SubTotales}</td>

                <td width="30px">
                    <button type="button" class="btn btn-sm btn-danger" onclick='handleDeleteDetalleVenta("detallepago_${cont}")'>
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
                <input type="hidden" name="detalleventa[]" value="${DetallesVentaID}">
                <input type="hidden" name="cuotapersonal[]" value="${CuotasPersonalID}">
                <input type="hidden" name="cuotas[]" value="${cuotas}">
                <input type="hidden" name="ComisionConsultores[]" value="${ComisionConsultores}">
                <input type="hidden" name="SubTotales[]" value="${SubTotales}">
            </tr>`

            //limpiar inputs
            $('#ComisionConsultor').val(0)
            $('#SubTotal').val(0)

        })

        // eliminar un detalle de venta de la lista
        function handleDeleteDetalleVenta(idDetallePago) {
            const item = document.getElementById(idDetallePago)
            tbodyDetallePago.removeChild(item)
            cantDetallesPago--
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

        const formCrearPago = document.getElementById('formCrearPago')
        formCrearPago.addEventListener('submit', (e) => {
            e.preventDefault()
            //verificar los datos obligatorios
            const {
                bsd_cuota_personal_id,
                bsd_venta_id,
                porcentaje_comision,
                comision_consultor,
                estado_carpeta,
                pago_1er_recibo,
                pago_dace,
                abono_consultor,
                total_pago,
                porcentaje_cump_dic,
                sum_total_ventas,
                sum_renta_total_ventas,
                sum_comision_bruta_dace
            } = e.target

            if (!porcentaje_comision.value || !porcentaje_comision.value.trim()) return alerta(
                'El campo Porcentaje Comision es obligatorio')

            if (!comision_consultor.value || !comision_consultor.value.trim()) return alerta(
                'El campo Comision Consultor es obligatorio')

            if (!estado_carpeta.value || !estado_carpeta.value.trim()) return alerta(
                'El campo Estado Carpeta es obligatorio')

            if (!pago_1er_recibo.value || !pago_1er_recibo.value.trim()) return alerta(
                'El campo Pago 1er Recibo es obligatorio')

            if (!pago_dace.value || !pago_dace.value.trim()) return alerta(
                'El campo Pago Dace es obligatorio')

            if (!abono_consultor.value || !abono_consultor.value.trim()) return alerta(
                'El campo Abono Consultor es obligatorio')

            //if (!total_pago.value || !total_pago.value.trim()) return alerta(
            //    'El campo Total Pago es obligatorio')

            if (!porcentaje_cump_dic.value) return alerta(
                'El campo Porcentaje Cumplimiento Dic es obligatorio')

            if (!sum_total_ventas.value) return alerta(
                'El campo Suma Total de Ventas es obligatorio')

            if (!sum_renta_total_ventas.value) return alerta(
                'El campo Suma Renta Total de Ventas es obligatorio')

            if (!sum_comision_bruta_dace.value) return alerta(
                'El campo Suma Comision Bruta es obligatorio')
            // if (!nro_oportunidad.value) return alerta('El campo Nro. Oportunidad es obligatorio')

            // if (nro_oportunidad.value.length > 18) return alerta(
            //     'El campo nro_oportunidad  acepta máximo 18 caracteres')

            // if (!estado_venta.value) return alerta('El campo Estado Venta es obligatorio')

            // if (!avance_oportunidad.value) return alerta('El campo Avance de Oportunidad es obligatorio')

            // if (sot.value && isNaN(sot.value)) return alerta('El campo SOT debe ser un número')

            // if (!sec.value || isNaN(sec.value)) return alerta('El campo SEC debe ser un número')

            // if (isNaN(nro_proyecto.value)) return alerta('El campo Nro Proyecto debe ser un número')

            // if (observacion.value.length > 350) return alerta(
            //     'El campo observaciones  acepta máximo 350 caracteres')

            if (!bsd_personal_id.value || !bsd_personal_id.value.trim()) return alerta('El Personal es obligatorio')

            if (!bsd_cuota_personal_id.value) return alerta('La cuota es obligatoria')

            // if (!razon_social.value || !razon_social.value.trim()) return alerta('El Cliente es obligatorio')

            if (cantDetallesPago === 0) return alerta('Detalles de pago es obligatorio')

            // $('#estado_venta').attr('disabled',false);

            formCrearPago.submit()
        })
    </script>
@stop
