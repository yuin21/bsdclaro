@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>DATOS DE BASERENUEVA</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <form action="{{ route('admin.importfile.parseImport') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="csv_file" class="form-label">
                        Archivo CSV a importar
                    </label>
                    {{-- block mt-1 w-full --}}
                    <input id="csv_file" name="csv_file" type="file"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                </div>

                <div class="mt-4 flex items-center">
                    <label for="header" class="form-label">
                        El archivo contiene una fila de encabezado?
                    </label>
                    {{-- ml-1 --}}
                    <input id="header" name="header" type="checkbox"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        checked>
                </div>

                {{-- mt-4 --}}
                <button type="submit" class="btn btn-primary">
                    cargar
                </button>
            </form>
        </div>

        @if ($data->count())
            <div class="card-body"  style="overflow: hidden">
                <div style="overflow: auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">sec</th>
                                <th scope="col">expediente</th>
                                <th scope="col">codigo_cliente</th>
                                <th scope="col">cod_bscs</th>
                                <th scope="col">cliente</th>
                                <th scope="col">dni_ruc</th>
                                <th scope="col">linea</th>
                                <th scope="col">plazo_acuerdo</th>
                                <th scope="col">pdv</th>
                                <th scope="col">cod_contrato</th>
                                <th scope="col">fecha_renovacion</th>
                                <th scope="col">liquidacion</th>
                                <th scope="col">plan</th>
                                <th scope="col">aaservicio</th>
                                <th scope="col">estado_servicio</th>
                                <th scope="col">cf</th>
                                <th scope="col">factor_renovacion</th>
                                <th scope="col">semana_pago</th>
                                <th scope="col">fecha_pago</th>
                                <th scope="col">extorno_topes</th>
                                <th scope="col">extorno_sivco</th>
                                <th scope="col">comision</th>
                                <th scope="col">oc</th>
                                <th scope="col">nota</th>
                                <th scope="col">segmento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->sec }}</td>
                                    <td>{{ $item->expediente }}</td>
                                    <td>{{ $item->codigo_cliente }}</td>
                                    <td>{{ $item->cod_bscs }}</td>
                                    <td>{{ $item->cliente }}</td>
                                    <td>{{ $item->dni_ruc }}</td>
                                    <td>{{ $item->linea }}</td>
                                    <td>{{ $item->plazo_acuerdo }}</td>
                                    <td>{{ $item->pdv }}</td>
                                    <td>{{ $item->cod_contrato }}</td>
                                    <td>{{ $item->fecha_renovacion }}</td>
                                    <td>{{ $item->liquidacion }}</td>
                                    <td>{{ $item->plan }}</td>
                                    <td>{{ $item->aaservicio }}</td>
                                    <td>{{ $item->estado_servicio }}</td>
                                    <td>{{ $item->cf }}</td>
                                    <td>{{ $item->factor_renovacion }}</td>
                                    <td>{{ $item->semana_pago }}</td>
                                    <td>{{ $item->fecha_pago }}</td>
                                    <td>{{ $item->extorno_topes }}</td>
                                    <td>{{ $item->extorno_sivco }}</td>
                                    <td>{{ $item->comision }}</td>
                                    <td>{{ $item->oc }}</td>
                                    <td>{{ $item->nota }}</td>
                                    <td>{{ $item->segmento }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $data->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay datos</strong>
            </div>
        @endif
    </div>
@stop
