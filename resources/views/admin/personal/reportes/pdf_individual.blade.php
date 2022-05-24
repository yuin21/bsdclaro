<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo PDF de Personal</title>
    <style>
        body {
            font-size: 18px;
        }

        h1 {
            font-weight: bold;
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
            min-width: 200px;
            display: inline-block;
            font-weight: bold;
        }

    </style>
</head>

<body>
    <h1>Reporte personal</h1>
    <h3 class="flex-grow-1">
        Personal:
        <span class="personal-name">
            {{ $personal->ape_paterno }} {{ $personal->ape_materno }} {{ $personal->nom_personal }}
        </span>
    </h3>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="list-group-iten-name">Nombre:</span> {{ $personal->nom_personal }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Apellido materno:</span> {{ $personal->ape_paterno }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Apellido paterno:</span> {{ $personal->ape_materno }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Cargo:</span> {{ $personal->cargo }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Tipo de documento:</span>
            {{ $personal->tipo_doc_iden }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Número de documento:</span>
            {{ $personal->nro_doc_iden }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Dirección:</span> {{ $personal->direccion }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Celular:</span> {{ $personal->celular }}
        </li>
        <li class="list-group-item">
            <span class="list-group-iten-name">Correo:</span> {{ $personal->email }}
        </li>
    </ul>
</body>

</html>
