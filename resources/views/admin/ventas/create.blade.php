@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.ventas.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de ventas
    </a>
    <h1 class="text-bold">Registrar venta</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.ventas.store']) !!}
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Datos generales</p>
                </div>
                <div class="card-body">
                    {!! Form::label('tipo_contrato', 'Tipo de Contrato') !!}
                    {!! Form::text('tipo_contrato', null, ['class' => 'form-control']) !!}
                    @error('tipo_contrato')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Detalles de venta</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            {!! Form::label('selectTipoServicio', 'Tipo de servicio') !!}
                            <select name="selectTipoServicio" id="selectTipoServicio" class="form-control">
                                @foreach ($tiposservicio as $tiposervicio)
                                    <option value="{{ $tiposervicio->id }}_{{ $tiposervicio->nom_tipo_servicio }}">
                                        {{ $tiposervicio->nom_tipo_servicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            {!! Form::label('selectServicio', 'Servicio') !!}
                            <select name="selectServicio" id="selectServicio" class="form-control">
                                @foreach ($servicios as $servicio)
                                    <option value="{{ $servicio->id }}_{{ $servicio->nom_servicio }}">
                                        {{ $servicio->nom_servicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            {!! Form::label('selectPlan', 'Plan') !!}
                            <select name="selectPlan" id="selectPlan" class="form-control">
                                @foreach ($planes as $plan)
                                    <option value="{{ $plan->id }}_{{ $plan->nombre_plan }}_{{ $plan->precio }}">
                                        {{ $plan->nombre_plan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2 d-flex  align-items-center" style="gap: 10px;">
                        {!! Form::label('precioplan', 'Precio del plan', ['style' => 'margin: 0; min-width:180px']) !!}
                        {!! Form::text('precioplan', $planes[0]->precio, ['class' => 'form-control mt-2', 'id' => 'precioplan', 'placeholder' => 'precio plan', 'disabled' => 'disabled']) !!}
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
                        @error('total')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-2 d-flex justify-content-end align-items-center" style="gap: 10px;">
                        {!! Form::label('inputTotal_sin_igv', 'Sin IGV', ['style' => 'margin: 0']) !!}
                        {!! Form::text('inputTotal_sin_igv', null, ['class' => 'form-control', 'id' => 'inputTotal_sin_igv', 'disabled' => 'disabled', 'style' => 'max-width: 150px']) !!}
                    </div>
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
                        <ul class="list-group mt-2">
                            <li class="list-group-item text-secondary">
                                <span class="text-bold">Cargo: </span> <span id="personal_cargo"></span>
                            </li>
                        </ul>
                        @error('bsd_personal_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-bold">Cliente</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('searchCliente', 'RUC') !!}
                        {!! Form::hidden('bsd_cliente_id', null, ['id' => 'bsd_cliente_id']) !!}
                        {!! Form::text('searchCliente', null, ['class' => 'form-control', 'id' => 'searchCliente']) !!}
                        <ul class="list-group mt-2">
                            <li class="list-group-item text-secondary">
                                <span class="text-bold">Razón social: </span> <span id="cliente_razonsocial"></span>
                            </li>
                        </ul>
                        @error('bsd_cliente_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {!! Form::submit('Registrar Venta', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
    </div>
    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
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
                $('#personal_cargo').text(selected.item.cargo)
            }
        })

        // busqueda de cliente
        $('#searchCliente').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('api.clientes.search') }}",
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
                $('#bsd_cliente_id').val(selected.item.id);
                $('#cliente_razonsocial').text(selected.item.razon_social)
            }
        })
    </script>
    <script>
        // seleccionar plan y mostrar su precio
        const selectTipoServicio = document.getElementById('selectTipoServicio')
        const selectServicio = document.getElementById('selectServicio')
        const selectPlan = document.getElementById('selectPlan')
        const inputCantidad = document.getElementById('inputCantidad')
        const inputNumerosLineasNuevas = document.getElementById('inputNumerosLineasNuevas')
        const btnAgregar = document.getElementById('btnAgregar')
        const tbodyDetalleVenta = document.getElementById('tbodyDetalleVenta')
        const inputTotal = document.getElementById('inputTotal')
        const inputTotal_sin_igv = document.getElementById('inputTotal_sin_igv')
        const total = document.getElementById('total') // input hidden para mandar a registrar

        let cont = 0
        let total_igv = 0
        let total_sin_igv = 0
        const IGV = 1.18

        selectPlan.addEventListener('input', (e) => {
            const dataPlan = e.target.value.split('_') // formato: Id, nombre, precio 
            $('#precioplan').val(dataPlan[2])
        })

        btnAgregar.addEventListener('click', () => {
            // obtener la data
            const tipoServicio = selectTipoServicio.value.split('_') // formato: Id, nombre
            const servicio = selectServicio.value.split('_') // formato: Id, nombre
            const plan = selectPlan.value.split('_') // formato: Id, nombre, precio 
            const cantidad = inputCantidad.value
            const numerosLineasNuevas = inputNumerosLineasNuevas.value
            const subtotal_igv = Number((plan[2] * cantidad).toFixed(2))
            const subtotal_sin_igv = Number((subtotal_igv / IGV).toFixed(2))

            // mostrar en la tabla y en inputs ocultos para formar un array que luego se envie al hacer submit
            cont++
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
            inputNumerosLineasNuevas.value = ''
        })

        inputNumerosLineasNuevas.addEventListener('input', (e) => {
            // calcular la cantidad a partir de la cantidad de numeros ingresados cuando es movil
            if (!e.target.value.trim()) return inputCantidad.value = 0
            const cantNumero = e.target.value.split(',').length
            console.log(cantNumero)
            inputCantidad.value = cantNumero
        })


        function handleDeleteDetalleVenta(idDetalleVenta, subtotal_igv, subtotal_sin_igv) {
            total_igv = Number((total_igv - subtotal_igv).toFixed(2))
            total_sin_igv = Number((total_igv / IGV).toFixed(2))
            inputTotal.value = total_igv
            inputTotal_sin_igv.value = total_sin_igv
            total.value = total_igv
            const item = document.getElementById(idDetalleVenta)
            tbodyDetalleVenta.removeChild(item)
        }
    </script>
@stop
