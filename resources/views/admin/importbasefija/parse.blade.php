@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos del archivo a cargar</h1>
@stop

@section('content')
    <div class="card p-2" style="overflow: hidden">

        <form action="{{ route('admin.importbasefija.processImport') }}" method="POST">
            @csrf
            <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}">
            <div style="overflow: auto">
                <table class="table table-striped">
                    @if (isset($headings))
                        <thead>
                            <tr>
                                @foreach ($headings[0][0] as $csv_header_field)
                                    {{-- @dd($headings) --}}
                                    <th scope="col">
                                        {{ $csv_header_field }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                    @endif

                    <tbody>
                        @foreach ($csv_data as $row)
                            <tr>
                                @foreach ($row as $key => $value)
                                    <td>
                                        {{ $value }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                        <tr>
                            @foreach ($csv_data[0] as $key => $value)
                                <td style="min-width: 130px">
                                    <select name="fields[{{ $key }}]" class="form-control form-control-sm">
                                        @foreach (config('app.db_fieldsfija') as $db_field)
                                            <option value="{{ \Request::has('header') ? $db_field : $loop->index }}"
                                                @if ($key === $db_field) selected @endif>{{ $db_field }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar datos</button>
        </form>

    </div>
@stop
