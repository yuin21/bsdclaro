@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-bold">VENTAS ACTIVAS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.reportes.consultar_venta_rpt', 'id' => 'formFechas']) !!}
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
           <span class="negrita"> MOVILES </span>
        </div>
        @if (!empty($ventas_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>CONSULTORES</th>
                            <th class="centrar">RENO</th>
                            <th class="centrar">C/ IGV</th>
                            <th class="centrar">S/ IGV</th>
                            <th class="centrar">ALTA</th>
                            <th class="centrar">PORTA</th>
                            <th class="centrar">N° LINEAS</th>
                            <th class="centrar">C/IGV MOVILES</th>
                            <th class="centrar">S/IGV MOVILES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas_rpt as $ventas)
                            <tr>
                                <td>{{ $ventas->CONSULTORES}}</td>
                                <td class="centrar">{{ $ventas->RENO}}</td>
                                <td class="derecha">S/. {{ number_format($ventas->CON_IGV,2) }}</td>
                                <td class="derecha">S/. {{ number_format($ventas->SIN_IGV,2)}}</td>
                                <td class="centrar">{{ $ventas->ALTA}}</td>
                                <td class="centrar">{{ $ventas->PORTA}}</td>
                                <td class="centrar">{{ $ventas->N_LINEAS}}</td>
                                <td class="derecha">S/. {{ number_format($ventas->CON_IGV_MOVILES,2)}}</td>
                                <td class="derecha">S/. {{ number_format($ventas->SIN_IGV_MOVILES,2)}}</td>
                                {!! Form::hidden('ventas_reno[]', $ventas->RENO, ['class' => 'form-control ventas_reno']) !!}
                                {!! Form::hidden('ventas_con_igv_reno[]', $ventas->CON_IGV, ['class' => 'form-control ventas_con_igv_reno']) !!}
                                {!! Form::hidden('ventas_sin_igv_reno[]', $ventas->SIN_IGV, ['class' => 'form-control ventas_sin_igv_reno']) !!}
                                {!! Form::hidden('ventas_alta[]', $ventas->ALTA, ['class' => 'form-control ventas_alta']) !!}
                                {!! Form::hidden('ventas_porta[]', $ventas->PORTA, ['class' => 'form-control ventas_porta']) !!}
                                {!! Form::hidden('ventas_n_lineas[]', $ventas->N_LINEAS, ['class' => 'form-control ventas_n_lineas']) !!}
                                {!! Form::hidden('ventas_con_igv_moviles[]', $ventas->CON_IGV_MOVILES, ['class' => 'form-control ventas_con_igv_moviles']) !!}
                                {!! Form::hidden('ventas_sin_igv_moviles[]', $ventas->SIN_IGV_MOVILES, ['class' => 'form-control ventas_sin_igv_moviles']) !!}
                            </tr>
                        @endforeach
                        <tr>
                            <td class="negrita">Total</td>
                            <td class="centrar negrita" id="total_venta_reno"></td>
                            <td class="negrita derecha" id="total_venta_con_igv_reno"></td>
                            <td class="negrita derecha" id="total_venta_sin_igv_reno"></td>
                            <td class="centrar negrita" id="total_venta_alta"></td>
                            <td class="centrar negrita" id="total_venta_porta"></td>
                            <td class="centrar negrita" id="total_venta_n_lineas"></td>
                            <td class="negrita derecha" id="total_venta_con_igv_moviles"></td>
                            <td class="negrita derecha" id="total_venta_sin_igv_moviles"></td>
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
            <span class="negrita"> Fijas </span>
        </div>
        @if (!empty($ventas_fijas_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>CONSULTORES</th>
                            <th class="centrar">IFI</th>
                            <th class="centrar">FTTH</th>
                            <th class="centrar">HFC</th>
                            <th class="centrar">UGIS</th>
                            <th class="centrar">C/IGV FIJA</th>
                            <th class="centrar">S/IGV FIJA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas_fijas_rpt as $ventas)
                            <tr>
                                <td>{{ $ventas->CONSULTORES}}</td>
                                <td class="centrar">{{ $ventas->IFI}}</td>
                                <td class="centrar">{{ $ventas->FTTH }}</td>
                                <td class="centrar">{{ $ventas->HFC}}</td>
                                <td class="centrar">{{ $ventas->UGIS}}</td>
                                <td class="derecha">S/. {{ number_format($ventas->CON_IGV_FIJA,2)}}</td>
                                <td class="derecha">S/. {{ number_format($ventas->SIN_IGV_FIJA,2)}}</td>
                                {!! Form::hidden('ventas_ifi[]', $ventas->IFI, ['class' => 'form-control ventas_ifi']) !!}
                                {!! Form::hidden('ventas_ftth[]', $ventas->FTTH, ['class' => 'form-control ventas_ftth']) !!}
                                {!! Form::hidden('ventas_hfc[]', $ventas->HFC, ['class' => 'form-control ventas_hfc']) !!}
                                {!! Form::hidden('ventas_ugis[]', $ventas->UGIS, ['class' => 'form-control ventas_ugis']) !!}
                                {!! Form::hidden('ventas_con_igv_fija[]', $ventas->CON_IGV_FIJA, ['class' => 'form-control ventas_con_igv_fija']) !!}
                                {!! Form::hidden('ventas_sin_igv_fija[]', $ventas->SIN_IGV_FIJA, ['class' => 'form-control ventas_sin_igv_fija']) !!}
                            </tr>
                        @endforeach
                            <tr>
                                <td class="negrita">Total</td>
                                <td class="centrar negrita" id="total_venta_ifi"></td>
                                <td class="centrar negrita" id="total_venta_tffh"></td>
                                <td class="centrar negrita" id="total_venta_hfc"></td>
                                <td class="centrar negrita" id="total_venta_ugis"></td>
                                <td class="negrita derecha" id="total_venta_con_igv_fija"></td>
                                <td class="negrita derecha" id="total_venta_sin_igv_fija"></td>
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
        var ventas_reno = document.getElementsByClassName('ventas_reno');
        var ventas_con_igv_reno = document.getElementsByClassName('ventas_con_igv_reno');
        var ventas_sin_igv_reno = document.getElementsByClassName('ventas_sin_igv_reno');
        var ventas_alta = document.getElementsByClassName('ventas_alta');
        var ventas_porta = document.getElementsByClassName('ventas_porta');
        var ventas_n_lineas = document.getElementsByClassName('ventas_n_lineas');
        var ventas_con_igv_moviles = document.getElementsByClassName('ventas_con_igv_moviles');
        var ventas_sin_igv_moviles = document.getElementsByClassName('ventas_sin_igv_moviles');
        //Fijas
        var ventas_ifi = document.getElementsByClassName('ventas_ifi');
        var ventas_ftth = document.getElementsByClassName('ventas_ftth');
        var ventas_hfc = document.getElementsByClassName('ventas_hfc');
        var ventas_ugis = document.getElementsByClassName('ventas_ugis');
        var ventas_con_igv_fija = document.getElementsByClassName('ventas_con_igv_fija');
        var ventas_sin_igv_fija = document.getElementsByClassName('ventas_sin_igv_fija');

        //Moviles
        arrayVentasReno = [];
        arrayVentasConIgvReno = [];
        arrayVentasSinIgvReno = [];
        arrayVentasAlta = [];
        arrayVentasPorta = [];
        arrayVentasNLineas = [];
        arrayVentasConIgvMoviles = [];
        arrayVentasSinIgvMoviles = [];

        //Fijas
        arrayVentasIfi = [];
        arrayVentasFtth = [];
        arrayVentasHfc = [];
        arrayVentasUgis = [];
        arrayVentasConIgvFija = [];
        arrayVentasSinIgvFija = [];

        //Moviles
        for (var i = 0; i < ventas_reno.length; i++) {
            arrayVentasReno[i] = ventas_reno[i].value;
            arrayVentasConIgvReno[i] = ventas_con_igv_reno[i].value;
            arrayVentasSinIgvReno[i] = ventas_sin_igv_reno[i].value;
            arrayVentasAlta[i] = ventas_alta[i].value;
            arrayVentasPorta[i] = ventas_porta[i].value;
            arrayVentasNLineas[i] = ventas_n_lineas[i].value;
            arrayVentasConIgvMoviles[i] = ventas_con_igv_moviles[i].value;
            arrayVentasSinIgvMoviles[i] = ventas_sin_igv_moviles[i].value;
        }

        //Fijas
        for (var i = 0; i < ventas_ifi.length; i++) {
            arrayVentasIfi[i] = ventas_ifi[i].value;
            arrayVentasFtth[i] = ventas_ftth[i].value;
            arrayVentasHfc[i] = ventas_hfc[i].value;
            arrayVentasUgis[i] = ventas_ugis[i].value;
            arrayVentasConIgvFija[i] = ventas_con_igv_fija[i].value;
            arrayVentasSinIgvFija[i] = ventas_sin_igv_fija[i].value;
        }

        $(function myFunction(){
            //Moviles
            var suma = 0
            for(var i = 0; i <arrayVentasReno.length;i++){
                suma = suma + Number(arrayVentasReno[i]);
                $("#total_venta_reno").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasConIgvReno.length;i++){
                suma = suma + Number(arrayVentasConIgvReno[i]);
                $("#total_venta_con_igv_reno").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayVentasSinIgvReno.length;i++){
                suma = suma + Number(arrayVentasSinIgvReno[i]);
                $("#total_venta_sin_igv_reno").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayVentasAlta.length;i++){
                suma = suma + Number(arrayVentasAlta[i]);
                $("#total_venta_alta").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasPorta.length;i++){
                suma = suma + Number(arrayVentasPorta[i]);
                $("#total_venta_porta").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasNLineas.length;i++){
                suma = suma + Number(arrayVentasNLineas[i]);
                $("#total_venta_n_lineas").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasConIgvMoviles.length;i++){
                suma = suma + Number(arrayVentasConIgvMoviles[i]);
                $("#total_venta_con_igv_moviles").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayVentasSinIgvMoviles.length;i++){
                suma = suma + Number(arrayVentasSinIgvMoviles[i]);
                $("#total_venta_sin_igv_moviles").text("S/. " + suma.toFixed(2))
            }
            //Fijas
            var suma = 0
            for(var i = 0; i <arrayVentasIfi.length;i++){
                suma = suma + Number(arrayVentasIfi[i]);
                $("#total_venta_ifi").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasFtth.length;i++){
                suma = suma + Number(arrayVentasFtth[i]);
                $("#total_venta_tffh").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasHfc.length;i++){
                suma = suma + Number(arrayVentasHfc[i]);
                $("#total_venta_hfc").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasUgis.length;i++){
                suma = suma + Number(arrayVentasUgis[i]);
                $("#total_venta_ugis").text(suma)
            }
            var suma = 0
            for(var i = 0; i <arrayVentasConIgvFija.length;i++){
                suma = suma + Number(arrayVentasConIgvFija[i]);
                $("#total_venta_con_igv_fija").text("S/. " + suma.toFixed(2))
            }
            var suma = 0
            for(var i = 0; i <arrayVentasSinIgvFija.length;i++){
                suma = suma + Number(arrayVentasSinIgvFija[i]);
                $("#total_venta_sin_igv_fija").text("S/. " + suma.toFixed(2))
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
