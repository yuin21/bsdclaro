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
                    <div class="mb-2">
                        {!! Form::label('tipo_contrato', 'Tipo de Contrato') !!}
                        {!! Form::text('tipo_contrato', null, ['class' => 'form-control']) !!}
                        @error('tipo_contrato')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-2">
                                {!! Form::label('tipo_entrega_vpo_bpo', 'Tipo BPO/VPO') !!}
                                {!! Form::text('tipo_entrega_vpo_bpo', null, ['class' => 'form-control']) !!}
                                @error('tipo_entrega_vpo_bpo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-2">
                                {!! Form::label('estado_te', 'Estado BPO/VPO') !!}
                                {!! Form::text('estado_te', null, ['class' => 'form-control']) !!}
                                @error('estado_te')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <div class="mb-2">
                                {!! Form::label('fecha_entrega_te', 'Fecha Entrega BPO/VPO', ['class' => 'text-nowrap']) !!}
                                {!! Form::date('fecha_entrega_te', null, ['class' => 'form-control']) !!}
                                @error('fecha_entrega_te')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        {!! Form::label('observaciones_te', 'Observación BPO/VPO') !!}
                        {!! Form::text('observaciones_te', null, ['class' => 'form-control']) !!}
                        @error('observaciones_te')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        {!! Form::label('observaciones', 'Observación') !!}
                        {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
                        @error('observaciones')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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
                                title="Tipo de servicio">
                                @foreach ($tiposservicio as $tiposervicio)
                                    <option value="{{ $tiposervicio->id }}_{{ $tiposervicio->nom_tipo_servicio }}">
                                        {{ $tiposervicio->nom_tipo_servicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="selectServicio" id="selectServicio" class="selectpicker form-control"
                                title="Servicio">
                                @foreach ($servicios as $servicio)
                                    <option
                                        value="{{ $servicio->id }}_{{ $servicio->nom_servicio }}_{{ $servicio->bsd_tipo_servicio_id }}">
                                        {{ $servicio->nom_servicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="selectPlan" id="selectPlan" class="selectpicker form-control" title="Plan">
                                @foreach ($planes as $plan)
                                    <option
                                        value="{{ $plan->id }}_{{ $plan->nombre_plan }}_{{ $plan->precio }}_{{ $plan->bsd_tipo_servicio_id }}">
                                        {{ $plan->nombre_plan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                        {!! Form::label('precioplan', 'Precio del plan', ['style' => 'margin: 0; min-width:180px']) !!}
                        {!! Form::text('precioplan', 0, ['class' => 'form-control mt-2', 'id' => 'precioplan', 'placeholder' => 'precio plan', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                        {!! Form::label('inputCantidad', 'Cantidad', ['style' => 'margin: 0; min-width:180px']) !!}
                        {!! Form::text('inputCantidad', 0, ['class' => 'form-control mt-2', 'id' => 'inputCantidad', 'placeholder' => 'cantidad', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                        {!! Form::label('inputNumerosLineasNuevas', 'Números de linea nueva', ['style' => 'margin: 0; min-width:180px']) !!}
                        {!! Form::text('inputNumerosLineasNuevas', null, ['class' => 'form-control mt-2', 'id' => 'inputNumerosLineasNuevas', 'placeholder' => 'Números de Lineas nuevas']) !!}
                    </div>
                    {!! Form::button('Agregar', ['class' => 'btn btn-success btn-sm mt-2', 'id' => 'btnAgregar']) !!}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="border">
                                <tr>
                                    <th>#</th>
                                    <th>Tipo Servicio</th>
                                    <th>Servicio</th>
                                    <th>Plan</th>
                                    <th>Precio Plan</th>
                                    <th>Cantidad</th>
                                    <th>Números de linea nueva</th>
                                    <th>Total</th>
                                    <th>Sin IGV</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbodyDetalleVenta">
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center text-danger" style="gap: 10px;">
                        {!! Form::label('total', 'Total', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal', null, ['class' => 'form-control text-danger', 'id' => 'inputTotal', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                        {!! Form::hidden('total', null) !!}
                    </div>
                    <div class="mt-2 d-flex justify-content-end align-items-center" style="gap: 10px;">
                        {!! Form::label('inputTotal_sin_igv', 'Sin IGV', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal_sin_igv', null, ['class' => 'form-control', 'id' => 'inputTotal_sin_igv', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
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
                {!! Form::submit('Registrar Venta', ['class' => 'btn btn-primary btn-lg']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger btn-lg ml-1">Cancelar</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        // const formCrearVenta = document.getElementById('formCrearVenta')
        // formCrearVenta.addEventListener('submit', (e) => {
        //     e.preventDefault()
        //     //verificar los datos obligatorios
        //     const {
        //         tipo_contrato,
        //         bsd_personal_id,
        //         razon_social,
        //     } = e.target
        //     const tbodyDetalleVenta = document.getElementById('tbodyDetalleVenta')

        //     if (tbodyDetalleVenta.childNotes.length === 0) {
        //         alerta('Detalles de venta es obligatorio')
        //     }

        //     console.log(tipo_contrato)
        //     // submit
        //     // formCrearVenta.submit()
        // })
    </script>
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
        const btnAgregar = document.getElementById('btnAgregar')
        const tbodyDetalleVenta = document.getElementById('tbodyDetalleVenta')
        const inputTotal = document.getElementById('inputTotal')
        const inputTotal_sin_igv = document.getElementById('inputTotal_sin_igv')
        const total = document.getElementById('total') // input hidden para mandar a registrar

        let cantDetallesVenta = 0 // parecido al cont
        let cont = 0 // el cont sirve para manejar un id diferente de cada detalle venta para eliminarlo
        let total_igv = 0
        let total_sin_igv = 0
        const IGV = 1.18

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
                $('#precioplan').val(0)
                $('#selectPlan').selectpicker('refresh');
                $('#selectServicio').selectpicker('refresh');
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
                inputNumerosLineasNuevas.value) {
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
            const subtotal_igv = Number((plan[2] * cantidad).toFixed(2))
            const subtotal_sin_igv = Number((subtotal_igv / IGV).toFixed(2))

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
                <td>${subtotal_igv}</td>
                <td>${subtotal_sin_igv}</td>
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
                <input type="hidden" name="subtotales_igv[]" value="${subtotal_igv}">
                <input type="hidden" name="subtotales_sinigv[]" value="${subtotal_sin_igv}">
            </tr>`

            inputTotal.value = total_igv
            inputTotal_sin_igv.value = total_sin_igv
            total.value = total_igv
            //limpiar inputs
            inputCantidad.value = '0'
            $('#precioplan').val(0)
            inputNumerosLineasNuevas.value = ''
            $("#selectServicio").val('default');
            $("#selectPlan").val('default');
            $('#selectPlan').selectpicker('refresh');
            $('#selectServicio').selectpicker('refresh');
        })

        // calcular la cantidad a partir de la cantidad de numeros ingresados cuando es movil
        inputNumerosLineasNuevas.addEventListener('input', (e) => {
            if (!e.target.value.trim()) return inputCantidad.value = 0
            const cantNumero = e.target.value.split(',').length
            inputCantidad.value = cantNumero
        })

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
            } = e.target

            if (!tipo_contrato.value || !tipo_contrato.value.trim()) return alerta(
                'El tipo contrato es obligatorio')

            if (!bsd_personal_id.value || !bsd_personal_id.value.trim()) return alerta('El Personal es obligatorio')

            if (!razon_social.value || !razon_social.value.trim()) return alerta('El Cliente es obligatorio')

            if (cantDetallesVenta === 0) {
                alerta('Detalles de venta es obligatorio')
            }

            formCrearVenta.submit()
        })
    </script>
@stop
