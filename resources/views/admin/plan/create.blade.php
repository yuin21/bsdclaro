@extends('adminlte::page')

@section('title', 'Crear Plan')

@section('content_header')
    <a href="{{ route('admin.plan.index') }}" class="float-right mt-2">
        <i class="fas fa-chevron-circle-left"></i> Ver lista de planes
    </a>
    <h1 class="text-bold">Crear Plan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.plan.store']) !!}
            @include('admin.plan.partials.form')
            <div class="float-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-danger ml-1">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <style>

    #precio{
        font-weight: bold;
        text-align: right;
    }

    </style>
@stop
@section('js')
    <script src="{{ asset('vendor/jquery-ui-1.13.1/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        function mascara(o,f){
		    v_obj=o;
		    v_fun=f;
		    setTimeout("execmascara()",1);
	    }
	    function execmascara(){
            //v = new Intl.NumberFormat('es-PE', { style: 'currency', currency: 'PEN' }).format(v);
		    v_obj.value=v_fun(v_obj.value);
            console.log(v_obj.value)
	    }
	    function cpf(v){
            //console.log("cpf")
		    v=v.replace(/([^0-9\.]+)/g,'');
            //console.log(v)
		    v=v.replace(/^[\.]/,'');
           // console.log(v)
		    v=v.replace(/[\.][\.]/g,'');
           // console.log(v)
		    v=v.replace(/\.(\d)(\d)(\d)/g,'.$1$2');
           // console.log(v)
		    v=v.replace(/\.(\d{1,2})\./g,'.$1');

            //v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g,'$1,');
            //console.log(v)
		    //v = v.toString().split('').reverse().join('').replace(/(\d{3})/g,'$1,');
            //console.log(v)
		    //v = v.split('').reverse().join('').replace(/^[\,]/,'');
           // console.log(v)
            //v = new Intl.NumberFormat('es-PE', { style: 'currency', currency: 'PEN' }).format(v);
           //console.log(v)
		    v="S/. "+ v;
		    return v;
	    }

    </script>
@stop
