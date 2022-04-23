@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Importar Base Movil</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            <form action="{{ route('admin.importbasemovil.parseImport') }}" method="POST" class="mb-4" enctype="multipart/form-data">
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
                            <th scope="col">fecha_operacion</th>
                            <th scope="col">tipo_operacion</th>
                            <th scope="col">cod_region</th>
                            <th scope="col">region</th>
                            <th scope="col">departamento</th>
                            <th scope="col">pdv</th>
                            <th scope="col">cod_pdv</th>
                            <th scope="col">customer_id</th>
                            <th scope="col">cod_bscs</th>
                            <th scope="col">co_id</th>
                            <th scope="col">fec_activacion</th>
                            <th scope="col">linea</th>
                            <th scope="col">estado_linea</th>
                            <th scope="col">fec_estado</th>
                            <th scope="col">plan</th>
                            <th scope="col">servicio</th>
                            <th scope="col">cargo_fijo</th>
                            <th scope="col">cargo_real</th>
                            <th scope="col">factor</th>
                            <th scope="col">ruc_cliente</th>
                            <th scope="col">comision_base</th>
                            <th scope="col">fecha_pago</th>
                            <th scope="col">semana_pago</th>
                            <th scope="col">estado_exp</th>
                            <th scope="col">fuera_plazo</th>
                            <th scope="col">extorno_sivco</th>
                            <th scope="col">extorno_tope</th>
                            <th scope="col">comision_final</th>
                            <th scope="col">oc</th>
                            <th scope="col">observacion</th>
                            <th scope="col">fecha_carga</th>
                            <th scope="col">periodo</th>
                            <th scope="col">tipo_cliente</th>
                            <th scope="col">tipo_comision</th>
                            <th scope="col">tipo_ruc</th>
                            <th scope="col">tipo_distribuidor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                <td>{{$item->sec}}</td>
                                <td>{{$item->fecha_operacion}}</td>
                                <td>{{$item->tipo_operacion}}</td>
                                <td>{{$item->cod_region}}</td>
                                <td>{{$item->region}}</td>
                                <td>{{$item->departamento}}</td>
                                <td>{{$item->pdv}}</td>
                                <td>{{$item->cod_pdv}}</td>
                                <td>{{$item->customer_id}}</td>
                                <td>{{$item->cod_bscs}}</td>
                                <td>{{$item->co_id}}</td>
                                <td>{{$item->fec_activacion}}</td>
                                <td>{{$item->linea}}</td>
                                <td>{{$item->estado_linea}}</td>
                                <td>{{$item->fec_estado}}</td>
                                <td>{{$item->plan}}</td>
                                <td>{{$item->servicio}}</td>
                                <td>{{$item->cargo_fijo}}</td>
                                <td>{{$item->cargo_real}}</td>
                                <td>{{$item->factor}}</td>
                                <td>{{$item->ruc_cliente}}</td>
                                <td>{{$item->comision_base}}</td>
                                <td>{{$item->fecha_pago}}</td>
                                <td>{{$item->semana_pago}}</td>
                                <td>{{$item->estado_exp}}</td>
                                <td>{{$item->fuera_plazo}}</td>
                                <td>{{$item->extorno_sivco}}</td>
                                <td>{{$item->extorno_tope}}</td>
                                <td>{{$item->comision_final}}</td>
                                <td>{{$item->oc}}</td>
                                <td>{{$item->observacion}}</td>
                                <td>{{$item->fecha_carga}}</td>
                                <td>{{$item->periodo}}</td>
                                <td>{{$item->tipo_cliente}}</td>
                                <td>{{$item->tipo_comision}}</td>
                                <td>{{$item->tipo_ruc}}</td>
                                <td>{{$item->tipo_distribuidor}}</td>
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
