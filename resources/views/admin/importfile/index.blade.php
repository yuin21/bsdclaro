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
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->sec }}</td>
                                <td>{{ $item->cliente }}</td>
                                <td>{{ $item->dni_ruc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

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
