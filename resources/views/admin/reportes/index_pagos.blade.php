@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-bold">CONSOLIDADO PAGOS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.reportes.consultar_pago_rpt', 'id' => 'formFechas']) !!}
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                {!! Form::label('fecha_inicio', 'Fecha Inicio', ['class' => 'text-nowrap']) !!}
                {!! Form::date('fecha_inicio', isset($fecha_inicio) ? $fecha_inicio :null, ['class' => 'form-control', 'id' => 'fecha_inicio']) !!}
                @error('fecha_inicio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-lg-6 col-sm-6">
                {!! Form::label('fecha_fin', 'Fecha Fin', ['class' => 'text-nowrap']) !!}
                {!! Form::date('fecha_fin', isset($fecha_fin) ? $fecha_fin :null, ['class' => 'form-control', 'id' => 'fecha_fin']) !!}
                @error('fecha_fin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary mt-4 float-right', 'id' => 'btnBuscar']) !!}
        {!! Form::close() !!}
    </div>
</div>
    <div class="card">
        <div class="card-header">
           <span class="negrita"> COMISION MOVILES </span>
        </div>
        @if (!empty($pagos_moviles_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>CONSULTOR</th>
                            <th class="centrar">ALTA</th>
                            <th class="centrar">PORTA</th>
                            <th class="centrar">RENO</th>
                            <th class="centrar">TOTAL VENTAS</th>
                            <th class="centrar">RENTA RENO</th>
                            <th class="centrar">RENTA TOTAL VENTAS</th>
                            <th class="centrar">COMISION BRUTA DACE</th>
                            <th class="centrar">COMISION NETA DACE</th>
                            <th class="centrar">COMISION CONSULTOR RENO</th>
                            <th class="centrar">COMISION CONSULTOR VENTAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos_moviles_rpt as $pagos)
                            <tr>
                                <td>{{ $pagos->CONSULTOR}}</td>
                                <td class="centrar">{{ $pagos->ALTA}}</td>
                                <td class="centrar">{{ $pagos->PORTA}}</td>
                                <td class="centrar">{{ $pagos->RENO}}</td>
                                <td class="centrar">{{ $pagos->TOTAL_VENTAS}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->RENTA_RENO,2) }}</td>
                                <td class="derecha">S/. {{ number_format($pagos->RENTA_TOTAL_VENTAS,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->COMISION_BRUTA_DACE,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->COMISION_NETA_DACE,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->COMISION_CONSULTAR_RENO,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->COMISION_CONSULTAR_VENTAS,2)}}</td>
                                {!! Form::hidden('pagos_alta[]', $pagos->ALTA, ['class' => 'form-control pagos_alta']) !!}
                                {!! Form::hidden('pagos_porta[]', $pagos->PORTA, ['class' => 'form-control pagos_porta']) !!}
                                {!! Form::hidden('pagos_reno[]', $pagos->RENO, ['class' => 'form-control pagos_reno']) !!}
                                {!! Form::hidden('pagos_total_ventas[]', $pagos->TOTAL_VENTAS, ['class' => 'form-control pagos_total_ventas']) !!}
                                {!! Form::hidden('pagos_renta_reno[]', $pagos->RENTA_RENO, ['class' => 'form-control pagos_renta_reno']) !!}
                                {!! Form::hidden('pagos_renta_total_ventas[]', $pagos->RENTA_TOTAL_VENTAS, ['class' => 'form-control pagos_renta_total_ventas']) !!}
                                {!! Form::hidden('pagos_comision_bruta_dace[]', $pagos->COMISION_BRUTA_DACE, ['class' => 'form-control pagos_comision_bruta_dace']) !!}
                                {!! Form::hidden('pagos_comision_neta_dace[]', $pagos->COMISION_NETA_DACE, ['class' => 'form-control pagos_comision_neta_dace']) !!}
                                {!! Form::hidden('pagos_comision_consultor_reno[]', $pagos->COMISION_CONSULTAR_RENO, ['class' => 'form-control pagos_comision_consultor_reno']) !!}
                                {!! Form::hidden('pagos_comision_consultor_ventas[]', $pagos->COMISION_CONSULTAR_VENTAS, ['class' => 'form-control pagos_comision_consultor_ventas']) !!}
                            </tr>
                        @endforeach
                        <tr>
                            <td class="negrita">Total</td>
                            <td class="centrar negrita" id="total_pagos_alta"></td>
                            <td class="negrita centrar" id="total_pagos_porta"></td>
                            <td class="negrita centrar" id="total_pagos_reno"></td>
                            <td class="centrar negrita" id="total_pagos_total_ventas"></td>
                            <td class="derecha negrita" id="total_pagos_renta_reno"></td>
                            <td class="derecha negrita" id="total_pagos_renta_total_ventas"></td>
                            <td class="negrita derecha" id="total_pagos_comision_bruta_dace"></td>
                            <td class="negrita derecha" id="total_pagos_comision_neta_dace"></td>
                            <td class="negrita derecha" id="total_pagos_comision_consultor_reno"></td>
                            <td class="negrita derecha" id="total_pagos_comision_consultor_ventas"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <strong>Sin Registros</strong>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            <span class="negrita"> COMISION FIJAS </span>
        </div>
        @if (!empty($pagos_fijas_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>CONSULTOR</th>
                            <th class="centrar">IFI</th>
                            <th class="centrar">HFC</th>
                            <th class="centrar">FIBRA</th>
                            <th class="centrar">FTTH</th>
                            <th class="centrar">OLO</th>
                            <th class="centrar">TOTAL</th>
                            <th class="centrar">RENTA_TOTAL</th>
                            <th class="centrar">COMISION_BRUTA_DACE</th>
                            <th class="centrar">COMISION_NETA_DACE</th>
                            <th class="centrar">COMISION_CONSULTOR_FIJAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos_fijas_rpt as $pagos)
                            <tr>
                                <td>{{ $pagos->CONSULTOR}}</td>
                                <td class="centrar">{{ $pagos->IFI}}</td>
                                <td class="centrar">{{ $pagos->HFC }}</td>
                                <td class="centrar">{{ $pagos->FIBRA}}</td>
                                <td class="centrar">{{ $pagos->FTTH}}</td>
                                <td class="centrar">{{ $pagos->OLO}}</td>
                                <td class="centrar">{{ $pagos->TOTAL}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->RENTA_TOTAL,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->COMISION_BRUTA_DACE,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->COMISION_NETA_DACE,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->COMISION_CONSULTOR_FIJAS,2)}}</td>
                                {!! Form::hidden('pagos_ifi[]', $pagos->IFI, ['class' => 'form-control pagos_ifi']) !!}
                                {!! Form::hidden('pagos_hfc[]', $pagos->HFC, ['class' => 'form-control pagos_hfc']) !!}
                                {!! Form::hidden('pagos_fibra[]', $pagos->FIBRA, ['class' => 'form-control pagos_fibra']) !!}
                                {!! Form::hidden('pagos_ftth[]', $pagos->FTTH, ['class' => 'form-control pagos_ftth']) !!}
                                {!! Form::hidden('pagos_olo[]', $pagos->OLO, ['class' => 'form-control pagos_olo']) !!}
                                {!! Form::hidden('pagos_total_fijas[]', $pagos->TOTAL, ['class' => 'form-control pagos_total_fijas']) !!}
                                {!! Form::hidden('pagos_renta_total_fijas[]', $pagos->RENTA_TOTAL, ['class' => 'form-control pagos_renta_total_fijas']) !!}
                                {!! Form::hidden('pagos_comision_bruta_dace_fijas[]', $pagos->COMISION_BRUTA_DACE, ['class' => 'form-control pagos_comision_bruta_dace_fijas']) !!}
                                {!! Form::hidden('pagos_comision_neta_fijas[]', $pagos->COMISION_NETA_DACE, ['class' => 'form-control pagos_comision_neta_fijas']) !!}
                                {!! Form::hidden('pagos_comision_consultor_fijas[]', $pagos->COMISION_CONSULTOR_FIJAS, ['class' => 'form-control pagos_comision_consultor_fijas']) !!}
                            </tr>
                        @endforeach
                            <tr>
                                <td class="negrita">Total</td>
                                <td class="centrar negrita" id="total_pago_ifi"></td>
                                <td class="centrar negrita" id="total_pago_hfc"></td>
                                <td class="centrar negrita" id="total_pago_fibra"></td>
                                <td class="centrar negrita" id="total_pago_ftth"></td>
                                <td class="negrita centrar" id="total_pago_olo"></td>
                                <td class="negrita centrar" id="total_pago_total_fijas"></td>
                                <td class="negrita derecha" id="total_pago_renta_total_fijas"></td>
                                <td class="negrita derecha" id="total_pago_comision_bruta_dace_fijas"></td>
                                <td class="negrita derecha" id="total_pago_comision_neta_fijas"></td>
                                <td class="negrita derecha" id="total_pago_comision_consultor_fijas"></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <strong>Sin Registros</strong>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            <span class="negrita"> COMISION TOTAL </span>
        </div>
        @if (!empty($pagos_comisiones_total_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>CONSULTOR</th>
                            <th class="centrar">MOVIL</th>
                            <th class="centrar">FIJA</th>
                            <th class="centrar">RENO</th>
                            <th class="centrar">SUB_TOTAL</th>
                            <th class="centrar">CUMP_DIC</th>
                            <th class="centrar">TOTAL</th>
                            <th class="centrar">CUOTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos_comisiones_total_rpt as $pagos)
                            <tr>
                                <td>{{ $pagos->CONSULTOR}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->MOVIL,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->FIJA,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->RENO,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->SUB_TOTAL,2)}}</td>
                                <td class="centrar">% {{ number_format($pagos->CUMP_DIC,2)}}</td>
                                <td class="derecha">S/. {{ number_format($pagos->TOTAL,2)}}</td>
                                <td class="centrar">% {{ number_format($pagos->CUOTA,2)*100}}</td>
                                {!! Form::hidden('pagos_movil_comisiones[]', $pagos->MOVIL, ['class' => 'form-control pagos_movil_comisiones']) !!}
                                {!! Form::hidden('pagos_fija_comisiones[]', $pagos->FIJA, ['class' => 'form-control pagos_fija_comisiones']) !!}
                                {!! Form::hidden('pagos_reno_comisiones[]', $pagos->RENO, ['class' => 'form-control pagos_reno_comisiones']) !!}
                                {!! Form::hidden('pagos_sub_total_comisiones[]', $pagos->SUB_TOTAL, ['class' => 'form-control pagos_sub_total_comisiones']) !!}
                                {!! Form::hidden('pagos_cump_dic_comisiones[]', $pagos->CUMP_DIC, ['class' => 'form-control pagos_cump_dic_comisiones']) !!}
                                {!! Form::hidden('pagos_total_comisiones[]', $pagos->TOTAL, ['class' => 'form-control pagos_total_comisiones']) !!}
                                {!! Form::hidden('pagos_cuota_comisiones[]', $pagos->CUOTA, ['class' => 'form-control pagos_cuota_comisiones']) !!}
                            </tr>
                        @endforeach
                            <tr>
                                <td class="negrita">Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                {{-- <td class="derecha negrita" id="total_pago_movil_comisiones"></td>
                                <td class="derecha negrita" id="total_pago_fija_comisiones"></td>
                                <td class="derecha negrita" id="total_pago_reno_comisiones"></td>--}}
                                <td class="derecha negrita" id="total_pago_sub_total_comisiones"></td>
                                {{--<td class="negrita centrar" id="total_pago_cump_dic_comisiones"></td>--}}
                                <td></td>
                                 <td class="negrita derecha" id="total_pago_total_comisiones"></td>
                                {{-- <td class="negrita centrar" id="total_pago_cuota_comisiones"></td> --}}
                                <td></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <strong>Sin Registros</strong>
            </div>
        @endif
    </div>
@stop

@section('js')
    <script>
        const btnBuscar = document.getElementById('btnBuscar')

        function alerta(title = 'Faltan datos') {
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

        const formFechas = document.getElementById('formFechas')
        formFechas.addEventListener('submit', (e) => {
            e.preventDefault()
            //verificar los datos obligatorios
            const {
                fecha_inicio,
                fecha_fin
            } = e.target

            if(fecha_inicio.value>fecha_fin.value) return alerta(
                'La Fecha de Inicio es mayor a la Fecha Fin'
            )

            if (!fecha_inicio.value && !fecha_fin.value) return  alerta(
                'Falta Fecha de Inicio y Fecha Fin')

            if (!fecha_inicio.value) return alerta(
                'Falta Fecha de Inicio')

            if (!fecha_fin.value) return  alerta(
                'Falta Fecha de Fin')

            formFechas.submit()
        })

    </script>

    <script>
        //Moviles
        var pagos_alta = document.getElementsByClassName('pagos_alta');
        var pagos_porta = document.getElementsByClassName('pagos_porta');
        var pagos_reno = document.getElementsByClassName('pagos_reno');
        var pagos_total_ventas = document.getElementsByClassName('pagos_total_ventas');
        var pagos_renta_reno = document.getElementsByClassName('pagos_renta_reno');
        var pagos_renta_total_ventas = document.getElementsByClassName('pagos_renta_total_ventas');
        var pagos_comision_bruta_dace = document.getElementsByClassName('pagos_comision_bruta_dace');
        var pagos_comision_neta_dace = document.getElementsByClassName('pagos_comision_neta_dace');
        var pagos_comision_consultor_reno = document.getElementsByClassName('pagos_comision_consultor_reno');
        var pagos_comision_consultor_ventas = document.getElementsByClassName('pagos_comision_consultor_ventas');

        //Moviles
        arrayPagosAlta = [];
        arrayPagosPorta = [];
        arrayPagosReno = [];
        arrayPagosTotalVentas = [];
        arrayPagosRentaReno = [];
        arrayPagosRentaTotalVentas = [];
        arrayPagosComisionBrutaDace = [];
        arrayPagosComisionNetaDace = [];
        arrayPagosComisionConsultorReno = [];
        arrayPagosComisionConsultorVentas = [];

        //Moviles
        for (var i = 0; i < pagos_alta.length; i++) {
            arrayPagosAlta[i] = pagos_alta[i].value;
            arrayPagosPorta[i] = pagos_porta[i].value;
            arrayPagosReno[i] = pagos_reno[i].value;
            arrayPagosTotalVentas[i] = pagos_total_ventas[i].value;
            arrayPagosRentaReno[i] = pagos_renta_reno[i].value;
            arrayPagosRentaTotalVentas[i] = pagos_renta_total_ventas[i].value;
            arrayPagosComisionBrutaDace[i] = pagos_comision_bruta_dace[i].value;
            arrayPagosComisionNetaDace[i] = pagos_comision_neta_dace[i].value;
            arrayPagosComisionConsultorReno[i] = pagos_comision_consultor_reno[i].value;
            arrayPagosComisionConsultorVentas[i] = pagos_comision_consultor_ventas[i].value;
        }

        $(function myFunction(){
            //Moviles
            var suma = 0
            for(var i = 0; i <arrayPagosAlta.length;i++){
                suma = suma + Number(arrayPagosAlta[i]);
                $("#total_pagos_alta").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosPorta.length;i++){
                suma = suma + Number(arrayPagosPorta[i]);
                $("#total_pagos_porta").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosReno.length;i++){
                suma = suma + Number(arrayPagosReno[i]);
                $("#total_pagos_reno").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosTotalVentas.length;i++){
                suma = suma + Number(arrayPagosTotalVentas[i]);
                $("#total_pagos_total_ventas").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosRentaReno.length;i++){
                suma = suma + Number(arrayPagosRentaReno[i]);
                $("#total_pagos_renta_reno").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosRentaTotalVentas.length;i++){
                suma = suma + Number(arrayPagosRentaTotalVentas[i]);
                $("#total_pagos_renta_total_ventas").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosComisionBrutaDace.length;i++){
                suma = suma + Number(arrayPagosComisionBrutaDace[i]);
                $("#total_pagos_comision_bruta_dace").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosComisionNetaDace.length;i++){
                suma = suma + Number(arrayPagosComisionNetaDace[i]);
                $("#total_pagos_comision_neta_dace").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosComisionConsultorReno.length;i++){
                suma = suma + Number(arrayPagosComisionConsultorReno[i]);
                $("#total_pagos_comision_consultor_reno").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosComisionConsultorVentas.length;i++){
                suma = suma + Number(arrayPagosComisionConsultorVentas[i]);
                $("#total_pagos_comision_consultor_ventas").text("S/. " + suma.toFixed(2))
            }
        });

    </script>

    <script>
        //Fijas
        var pagos_ifi = document.getElementsByClassName('pagos_ifi');
        var pagos_hfc = document.getElementsByClassName('pagos_hfc');
        var pagos_fibra = document.getElementsByClassName('pagos_fibra');
        var pagos_ftth = document.getElementsByClassName('pagos_ftth');
        var pagos_olo = document.getElementsByClassName('pagos_olo');
        var pagos_total_fijas = document.getElementsByClassName('pagos_total_fijas');
        var pagos_renta_total_fijas = document.getElementsByClassName('pagos_renta_total_fijas');
        var pagos_comision_bruta_dace_fijas = document.getElementsByClassName('pagos_comision_bruta_dace_fijas');
        var pagos_comision_neta_fijas = document.getElementsByClassName('pagos_comision_neta_fijas');
        var pagos_comision_consultor_fijas = document.getElementsByClassName('pagos_comision_consultor_fijas');

        //Fijas
        arrayPagosIfi = [];
        arrayPagosHfc = [];
        arrayPagosFibra = [];
        arrayPagosFtth = [];
        arrayPagosOlo = [];
        arrayPagosTotalFijas = [];
        arrayPagosRentaTotalFijas = [];
        arrayPagosComisionBrutaDaceFijas = [];
        arrayPagosComisionNetaFijas = [];
        arrayPagosComisionConsultorFijas = [];

        //Fijas
        for (var i = 0; i < pagos_ifi.length; i++) {
            arrayPagosIfi[i] = pagos_ifi[i].value;
            arrayPagosHfc[i] = pagos_hfc[i].value;
            arrayPagosFibra[i] = pagos_fibra[i].value;
            arrayPagosFtth[i] = pagos_ftth[i].value;
            arrayPagosOlo[i] = pagos_olo[i].value;
            arrayPagosTotalFijas[i] = pagos_total_fijas[i].value;
            arrayPagosRentaTotalFijas[i] = pagos_renta_total_fijas[i].value;
            arrayPagosComisionBrutaDaceFijas[i] = pagos_comision_bruta_dace_fijas[i].value;
            arrayPagosComisionNetaFijas[i] = pagos_comision_neta_fijas[i].value;
            arrayPagosComisionConsultorFijas[i] = pagos_comision_consultor_fijas[i].value;
        }

        $(function myFunction(){
            //Fijas
            var suma = 0
            for(var i = 0; i <arrayPagosIfi.length;i++){
                suma = suma + Number(arrayPagosIfi[i]);
                $("#total_pago_ifi").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosHfc.length;i++){
                suma = suma + Number(arrayPagosHfc[i]);
                $("#total_pago_hfc").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosFibra.length;i++){
                suma = suma + Number(arrayPagosFibra[i]);
                $("#total_pago_fibra").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosFtth.length;i++){
                suma = suma + Number(arrayPagosFtth[i]);
                $("#total_pago_ftth").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosOlo.length;i++){
                suma = suma + Number(arrayPagosOlo[i]);
                $("#total_pago_olo").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosTotalFijas.length;i++){
                suma = suma + Number(arrayPagosTotalFijas[i]);
                $("#total_pago_total_fijas").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosRentaTotalFijas.length;i++){
                suma = suma + Number(arrayPagosRentaTotalFijas[i]);
                $("#total_pago_renta_total_fijas").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosComisionBrutaDaceFijas.length;i++){
                suma = suma + Number(arrayPagosComisionBrutaDaceFijas[i]);
                $("#total_pago_comision_bruta_dace_fijas").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosComisionNetaFijas.length;i++){
                suma = suma + Number(arrayPagosComisionNetaFijas[i]);
                $("#total_pago_comision_neta_fijas").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosComisionConsultorFijas.length;i++){
                suma = suma + Number(arrayPagosComisionConsultorFijas[i]);
                $("#total_pago_comision_consultor_fijas").text("S/. " + suma.toFixed(2))
            }
        });

    </script>

    <script>
        //Comisiones
        var pagos_movil_comisiones = document.getElementsByClassName('pagos_movil_comisiones');
        var pagos_fija_comisiones = document.getElementsByClassName('pagos_fija_comisiones');
        var pagos_reno_comisiones = document.getElementsByClassName('pagos_reno_comisiones');
        var pagos_sub_total_comisiones = document.getElementsByClassName('pagos_sub_total_comisiones');
        var pagos_cump_dic_comisiones = document.getElementsByClassName('pagos_cump_dic_comisiones');
        var pagos_total_comisiones = document.getElementsByClassName('pagos_total_comisiones');
        var pagos_cuota_comisiones = document.getElementsByClassName('pagos_cuota_comisiones');

        //Comisiones
        arrayPagosMovilComisiones = [];
        arrayPagosFijaComisiones = [];
        arrayPagosRenoComisiones = [];
        arrayPagosSubTotalComisiones = [];
        arrayPagosCumpDicComisiones = [];
        arrayPagosTotalComisiones = [];
        arrayPagosCuotaComisiones = [];

        //Comisiones
        for (var i = 0; i < pagos_movil_comisiones.length; i++) {
            arrayPagosMovilComisiones[i] = pagos_movil_comisiones[i].value;
            arrayPagosFijaComisiones[i] = pagos_fija_comisiones[i].value;
            arrayPagosRenoComisiones[i] = pagos_reno_comisiones[i].value;
            arrayPagosSubTotalComisiones[i] = pagos_sub_total_comisiones[i].value;
            arrayPagosCumpDicComisiones[i] = pagos_cump_dic_comisiones[i].value;
            arrayPagosTotalComisiones[i] = pagos_total_comisiones[i].value;
            arrayPagosCuotaComisiones[i] = pagos_cuota_comisiones[i].value;
        }

        $(function myFunction(){
            //Comisiones
            var suma = 0
            for(var i = 0; i <arrayPagosMovilComisiones.length;i++){
                suma = suma + Number(arrayPagosMovilComisiones[i]);
                $("#total_pago_movil_comisiones").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosFijaComisiones.length;i++){
                suma = suma + Number(arrayPagosFijaComisiones[i]);
                $("#total_pago_fija_comisiones").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosRenoComisiones.length;i++){
                suma = suma + Number(arrayPagosRenoComisiones[i]);
                $("#total_pago_reno_comisiones").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosSubTotalComisiones.length;i++){
                suma = suma + Number(arrayPagosSubTotalComisiones[i]);
                $("#total_pago_sub_total_comisiones").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosCumpDicComisiones.length;i++){
                suma = suma + Number(arrayPagosCumpDicComisiones[i]);
                $("#total_pago_cump_dic_comisiones").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayPagosTotalComisiones.length;i++){
                suma = suma + Number(arrayPagosTotalComisiones[i]);
                $("#total_pago_total_comisiones").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayPagosCuotaComisiones.length;i++){
                suma = suma + Number(arrayPagosCuotaComisiones[i]);
                $("#total_pago_cuota_comisiones").text(suma)
            }
        });

    </script>
@stop

@section('css')
    <style>
        .centrar{
            text-align: center;
        }
        .negrita{
            font-weight: bold;
        }
        .derecha{
            text-align: right;
        }
    </style>
@stop
