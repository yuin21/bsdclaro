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
    <h1 style="text-align:center">Lista personal</h1>
    <?php
    date_default_timezone_set('America/Lima')
    ?>
    <p style="text-align:right">Fecha impresion: {{ $date = date('Y/m/d h:i A')}}</p>
    <hr color="#000000">

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Personal</th>
                <th>Cargo</th>
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


<style>
    .page-break {
        page-break-after: always;
    }
    </style>
    <hr color="#000000">
    <p style="text-align:right">Pagina 1</p>
    <div class="page-break"></div>

    <script type="text/php">
       if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
