@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Importar Base Fija</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <form action="{{ route('admin.importbasefija.parseImport') }}" method="POST" class="mb-4" enctype="multipart/form-data">
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
                            <th scope="col">plataforma</th>
                            <th scope="col">ceco</th>
                            <th scope="col">codcliente</th>
                            <th scope="col">nomcliente</th>
                            <th scope="col">documento</th>
                            <th scope="col">num_docu</th>
                            <th scope="col">sec</th>
                            <th scope="col">linea</th>
                            <th scope="col">proyecto</th>
                            <th scope="col">ugis</th>
                            <th scope="col">sot</th>
                            <th scope="col">estadosot</th>
                            <th scope="col">solucion</th>
                            <th scope="col">promocion</th>
                            <th scope="col">campana</th>
                            <th scope="col">fecinstalacion</th>
                            <th scope="col">status_carpeta</th>
                            <th scope="col">cargo_fijo</th>
                            <th scope="col">semanapago</th>
                            <th scope="col">motivo_pago</th>
                            <th scope="col">factor</th>
                            <th scope="col">comision_a_recibir</th>
                            <th scope="col">comision_total</th>
                            <th scope="col">poliza</th>
                            <th scope="col">fecha_emision</th>
                            <th scope="col">vendedor</th>
                            <th scope="col">distrito</th>
                            <th scope="col">codplano</th>
                            <th scope="col">plano</th>
                            <th scope="col">usuarioregistro</th>
                            <th scope="col">ruc</th>
                            <th scope="col">campo02</th>
                            <th scope="col">campo03</th>
                            <th scope="col">campo04</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                <td>{{$item->plataforma}}</td>
                                <td>{{$item->ceco}}</td>
                                <td>{{$item->codcliente}}</td>
                                <td>{{$item->nomcliente}}</td>
                                <td>{{$item->documento}}</td>
                                <td>{{$item->num_docu}}</td>
                                <td>{{$item->sec}}</td>
                                <td>{{$item->linea}}</td>
                                <td>{{$item->proyecto}}</td>
                                <td>{{$item->ugis}}</td>
                                <td>{{$item->sot}}</td>
                                <td>{{$item->estadosot}}</td>
                                <td>{{$item->solucion}}</td>
                                <td>{{$item->promocion}}</td>
                                <td>{{$item->campana}}</td>
                                <td>{{$item->fecinstalacion}}</td>
                                <td>{{$item->status_carpeta}}</td>
                                <td>{{$item->cargo_fijo}}</td>
                                <td>{{$item->semanapago}}</td>
                                <td>{{$item->motivo_pago}}</td>
                                <td>{{$item->factor}}</td>
                                <td>{{$item->comision_a_recibir}}</td>
                                <td>{{$item->comision_total}}</td>
                                <td>{{$item->poliza}}</td>
                                <td>{{$item->fecha_emision}}</td>
                                <td>{{$item->vendedor}}</td>
                                <td>{{$item->distrito}}</td>
                                <td>{{$item->codplano}}</td>
                                <td>{{$item->plano}}</td>
                                <td>{{$item->usuarioregistro}}</td>
                                <td>{{$item->ruc}}</td>
                                <td>{{$item->campo02}}</td>
                                <td>{{$item->campo03}}</td>
                                <td>{{$item->campo04}}</td>
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
