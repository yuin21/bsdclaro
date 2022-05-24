<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo PDF de Personal</title>
    <style>
        body {
            font-size: 12px;
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
    <h1>Reporte personal</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Personal</th>
                <th>cargo</th>
                <th>Tipo Per.</th>
                <th>Tipo Doc.</th>
                <th>Nro. Doc.</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bsd_personal as $personal)
                <tr>
                    <td width="20px">{{ $loop->iteration }}</td>
                    <td>{{ $personal->ape_paterno }} {{ $personal->ape_materno }}
                        {{ $personal->nom_personal }}
                    </td>
                    <td>{{ $personal->cargo }}</td>
                    <td>{{ $personal->tipo_personal }}</td>
                    <td>{{ $personal->tipo_doc_iden }}</td>
                    <td>{{ $personal->nro_doc_iden }}</td>
                    <td>{{ $personal->direccion }}</td>
                    <td>{{ $personal->celular }}</td>
                    <td>{{ $personal->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
