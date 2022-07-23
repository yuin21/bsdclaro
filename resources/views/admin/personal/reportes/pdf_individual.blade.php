<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo PDF de Personal</title>
    <style>
        body {
            font-size: 15px;
        }

        h1 {
            font-weight: bold;
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
    <h1 style="text-align:center">Reporte Personal</h1>
    <?php
    date_default_timezone_set('America/Lima')
    ?>
    <p style="text-align:right">Fecha impresion: {{ $date = date('d/m/Y h:i A')}}</p>
    <hr color="#000000">


        <body>
                <ul class="table">

                <div class="card">
                    Nombre: {{ $personal->nom_personal }}
                </div>

                <div class="card">
                    Apellido materno:{{ $personal->ape_paterno }}
                </div>

                <div class="card">
                    <span class="list-group-iten-name">Apellido paterno:</span> {{ $personal->ape_materno }}
                </div>

                <div class="card">
                    <span class="list-group-iten-name">Cargo:</span> {{ $personal->cargo }}
                </div>

                <div class="card">
                    <span class="list-group-iten-name">Tipo de documento:</span>
                    {{ $personal->tipo_doc_iden }}
                </div>

                <div class="card">
                    <span class="list-group-iten-name">Número de documento:</span>
                    {{ $personal->nro_doc_iden }}
                </div>
                <div class="card">
                    <span class="list-group-iten-name">Dirección:</span> {{ $personal->direccion }}
                </div>
                <div class="card">
                    <span class="list-group-iten-name">Celular:</span> {{ $personal->celular }}
                </div>
                <div class="card">
                    <span class="list-group-iten-name">Correo:</span> {{ $personal->email }}
                </div>
            </ul>

        </body>
</body>
</html>
