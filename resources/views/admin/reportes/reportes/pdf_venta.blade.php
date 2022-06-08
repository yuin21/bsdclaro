<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF de Venta</title>
    <style>
        body {
            font-size: 18px;
        }

        h1 {
            font-weight: bold;
        }

        .subtitulo {
            border-bottom: 1px solid rgb(184, 184, 184);
            padding-bottom: 5px;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .personal-name {
            padding: 5px 15px 0px;
            margin-left: 5px;
            margin-bottom: 20px;
            display: inline-block;
            background: rgb(214, 160, 33);
            border-radius: 5px;
        }

        .list-group {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .list-group-item {
            margin-bottom: 10px;
        }

        .list-group-iten-name {
            min-width: 350px;
            display: inline-block;
            font-weight: bold;
        }

        .table {
            font-size: 15px;
        }

        .table thead {
            background: rgb(196, 196, 196);
            border-bottom: 1px solid gray;
        }

        .table thead th {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .table tbody td {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .table tbody tr {
            border-bottom: 1px solid rgb(196, 196, 196);
        }
    </style>
</head>

<body>
    <h1>Reporte de venta</h1>
    <h3 class="flex-grow-1">
        Fecha de registro:
        <span class="personal-name">
            {{ $venta->fecha_registro }}
        </span>
    </h3>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="list-group-iten-name">Tipo de contrato: </span>
            {{ $venta->tipo_contrato === 'V' ? 'Virtual' : 'Fisico' }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Saliforce:</span> {{ $venta->salesforce === 'N' ? 'NO' : 'SI' }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">SOT:</span> {{ $venta->sot }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">SEC:</span> {{ $venta->sec }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Nro. Proyecto: </span> {{ $venta->nro_proyecto }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Nro. Oportunidad: </span>
            {{ $venta->nro_oportunidad }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Fecha Conformidad:</span> {{ $venta->getEstado_Venta() }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Celular:</span> {{ $venta->fecha_conforme }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Fecha de Avance de Oportunidad:</span>
            {{ $venta->fecha_avance_oportunidad }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Fecha Entrega:</span> {{ $venta->fecha_entrega }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Celular:</span> {{ $venta->fecha_conforme }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Fecha Avance Ganada:</span> {{ $venta->avance_oportunidad }} %
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Observación:</span> {{ $venta->observacion }}
        </li>
    </ul>
    <h3 class="subtitulo">
        Cliente:
    </h3>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="list-group-iten-name">Razón social:</span> {{ $venta->cliente->razon_social }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">RUC:</span> {{ $venta->cliente->ruc }}
        </li>
    </ul>
    <h3 class="subtitulo">
        Personal:
    </h3>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="list-group-iten-name">Nombre:</span> {{ $venta->personal->getFullNameAttribute() }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Cargo:</span> {{ $venta->personal->cargo }}
        </li>
    </ul>
    <h3 class="subtitulo">
        Detalles de venta:
    </h3>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Tipo Servicio</th>
                    <th>Servicio</th>
                    <th>Plan</th>
                    <th>Precio Plan</th>
                    <th>Cantidad/UGIS</th>
                    <th>Números de linea nueva</th>
                    <th>Equipo/Producto</th>
                    <th>Operador</th>
                    <th>Estado de Linea</th>
                    <th>Fecha de Activado</th>
                    <th>Fecha Liquidado</th>
                    <th>Hora</th>
                    <th>Sin IGV</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="tbodyDetalleVenta">
                @foreach ($venta->detallesventa as $detalle)
                    <tr>
                        <td width="20px">{{ $loop->iteration }}</td>
                        <td> {{ $detalle->tipoServicio->nom_tipo_servicio }}</td>
                        <td> {{ $detalle->servicio->nom_servicio }}</td>
                        <td> {{ $detalle->plan->nombre_plan }}</td>
                        <td class="tag-number" id="precio"> {{ number_format($detalle->plan->precio, 2) }}
                        </td>
                        <td class="tag-number" id="cantidad"> {{ $detalle->cantidad }}</td>
                        <td>
                            @foreach ($detalle->numerosLineaNueva as $numero)
                                <span class="badge bg-secondary">
                                    {{ $numero->numero_linea_nueva }}
                                </span>
                            @endforeach
                        </td>
                        <td> {{ $detalle->equipo_producto }}</td>
                        <td> {{ $detalle->operador }}</td>
                        <td> {{ $detalle->getEstado_Linea() }}</td>
                        <td> {{ $detalle->fecha_activado }}</td>
                        <td> {{ $detalle->fecha_liquidado }}</td>
                        <td> {{ $detalle->hora }}</td>
                        <td class="tag-number" id="total_sin_igv">
                            {{ number_format($detalle->cf_sin_igv, 2) }}</td>
                        <td class="tag-number" id="total_con_igv">
                            {{ number_format($detalle->cf_con_igv, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <ul class="list-group" style="margin-top: 20px">
            <li class="list-group-item">
                <span class="list-group-iten-name">TOTAL:</span> {{ number_format($venta->total, 2) }}
            </li>
            <li class="list-group-item">
                <span class="list-group-iten-name">TOTAL sin igv:</span> {{ round($venta->total / 1.18, 2) }}
            </li>
        </ul>
    </div>
</body>

</html>
