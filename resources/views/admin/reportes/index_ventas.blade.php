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
            MOVILES
        </div>
        @if (!empty($ventas_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>CONSULTORES</th>
                            <th>RENO</th>
                            <th>C/ IGV</th>
                            <th>S/ IGV</th>
                            <th>ALTA</th>
                            <th>PORTA</th>
                            <th>N° LINEAS</th>
                            <th>C/IGV MOVILES</th>
                            <th>S/IGV MOVILES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas_rpt as $ventas)
                            <tr>
                                <td>{{ $ventas->CONSULTORES}}</td>
                                <td>{{ $ventas->RENO}}</td>
                                <td>{{ $ventas->CON_IGV }}</td>
                                <td>{{ $ventas->SIN_IGV}}</td>
                                <td>{{ $ventas->ALTA}}</td>
                                <td>{{ $ventas->PORTA}}</td>
                                <td>{{ $ventas->N_LINEAS}}</td>
                                <td>{{ $ventas->CON_IGV_MOVILES}}</td>
                                <td>{{ $ventas->SIN_IGV_MOVILES}}</td>
                            </tr>
                        @endforeach
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
            Fijas
        </div>
        @if (!empty($ventas_fijas_rpt))
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="border">
                        <tr>
                            <th>CONSULTORES</th>
                            <th>IFI</th>
                            <th>FTTH</th>
                            <th>HFC</th>
                            <th>UGIS</th>
                            <th>C/IGV FIJA</th>
                            <th>S/IGV FIJA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas_fijas_rpt as $ventas)
                            <tr>
                                <td>{{ $ventas->CONSULTORES}}</td>
                                <td>{{ $ventas->IFI}}</td>
                                <td>{{ $ventas->FTTH }}</td>
                                <td>{{ $ventas->HFC}}</td>
                                <td>{{ $ventas->UGIS}}</td>
                                <td>{{ $ventas->CON_IGV_FIJA}}</td>
                                <td>{{ $ventas->SIN_IGV_FIJA}}</td>
                            </tr>
                        @endforeach
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
@stop
