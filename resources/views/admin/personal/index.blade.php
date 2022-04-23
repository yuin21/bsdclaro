@extends('adminlte::page')

@section('title', 'Listado del Personal')

@section('content_header')
    <h1>Personal</h1>
@stop

@section('content')

 @if (Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif
    
<!--Mostrar los datos mas convenientes-->
<a href="{{ url('admin/personal/create') }}" class="btn btn-success">Registrar Personal</a><br>
<table class="table table_light">
    <thead class="table_light">
        <tr>
            <th>Personal</th>
            <th>cargo</th>
            <th>tipo Doc.</th>
            <th>Nro. Doc.</th>
            <th>direccion</th>
            <th>celular</th>
            <th>email</th>
            <th>estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bsd_personal as $personal)
        <tr>
            <td>{{$personal->ape_paterno}} {{$personal->ape_materno}} {{$personal->nom_personal}}</td>
            <td>{{$personal->cargo}}</td>
            <td>{{$personal->tipo_doc_iden}}</td>
            <td>{{$personal->nro_doc_iden}}</td>
            <td>{{$personal->direccion}}</td>
            <td>{{$personal->celular}}</td>
            <td>{{$personal->email}}</td>
            <td>{{$personal->estado}}</td>
            <td>
                <a href="{{ url('/admin/personal/'.$personal->id_personal.'/edit') }}" class="btn btn-warning">
                Editar 
                </a>
                <a href="{{ url('/admin/personal/'.$personal->id_personal) }}" class="btn btn-primary">
                    Ver
                </a>
                <form action="{{ url('/admin/personal/'.$personal->id_personal) }}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer">
    {{ $bsd_personal->links() }}
</div>
@stop