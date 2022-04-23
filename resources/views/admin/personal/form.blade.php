@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
    <ul>
    @foreach ($errors->all() as $error)
        <li>
        {{$error}}
        </li>
    @endforeach
    </ul>
    </div>
@endif
<!-- Actualizar los campos, por nombres mas adecuados según lo conveniente-->
<div class="<div class="form-group">
<label for="razon"> Razon </label>
<input id="razon" class="form-control" type="text" name="razon" value="{{isset($reporteventamovil->razon)?$reporteventamovil->razon:old('razon')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="ejecutivo"> Ejecutivo </label>
<input id="ejecutivo" class="form-control"  type="text" name="ejecutivo" value="{{isset($reporteventamovil->ejecutivo)?$reporteventamovil->ejecutivo:old('ejecutivo')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="razon_social"> Razon Social </label>
<input id="razon_social" class="form-control" type="text" name="razon_social" value="{{isset($reporteventamovil->razon_social)?$reporteventamovil->razon_social:old('razon_social')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="ruc"> RUC </label>
<input id="ruc" type="text" class="form-control" name="ruc" value="{{isset($reporteventamovil->ruc)?$reporteventamovil->ruc:old('ruc')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="numero_celular"> Numero Celular </label>
<input id="numero_celular" class="form-control" type="text" name="numero_celular" value="{{isset($reporteventamovil->numero_celular)?$reporteventamovil->numero_celular:old('numero_celular')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="cantidad"> Cantidad </label>
<input id="cantidad" class="form-control" type="text" name="cantidad" value="{{isset($reporteventamovil->cantidad)?$reporteventamovil->cantidad:old('cantidad')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="plan_vendido"> Plan Vendido </label>
<input id="plan_vendido" class="form-control" type="text" name="plan_vendido" value="{{isset($reporteventamovil->plan_vendido)?$reporteventamovil->plan_vendido:old('plan_vendido')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="cf_con_igv"> CF con IGV </label>
<input id="cf_con_igv" class="form-control" type="text" name="cf_con_igv" value="{{isset($reporteventamovil->cf_con_igv)?$reporteventamovil->cf_con_igv:old('cf_con_igv')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="cf_sin_igv"> CF sin IGV </label>
<input id="cf_sin_igv" class="form-control" type="text" name="cf_sin_igv" value="{{isset($reporteventamovil->cf_sin_igv)?$reporteventamovil->cf_sin_igv:old('cf_sin_igv')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="equipo"> Equipo </label>
<input id="equipo" class="form-control" type="text" name="equipo" value="{{isset($reporteventamovil->equipo)?$reporteventamovil->equipo:old('equipo')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="estado_tipo"> Alta/Porta/Renueva </label>
<input id="estado_tipo" class="form-control" type="text" name="estado_tipo" value="{{isset($reporteventamovil->estado_tipo)?$reporteventamovil->estado_tipo:old('estado_tipo')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="operador"> Operacion </label>
<input id="operador" class="form-control" type="text" name="operador" value="{{isset($reporteventamovil->operador)?$reporteventamovil->operador:old('operador')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="fecha_registro"> Fecha Registro </label>
<input id="fecha_registro" class="form-control" type="text" name="fecha_registro" value="{{isset($reporteventamovil->fecha_registro)?$reporteventamovil->fecha_registro:old('fecha_registro')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="tipo_contrato"> Tipo Contrato </label>
<input id="tipo_contrato" class="form-control" type="text" name="tipo_contrato" value="{{isset($reporteventamovil->tipo_contrato)?$reporteventamovil->tipo_contrato:old('tipo_contrato')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="sec"> Sec </label>
<input id="sec" class="form-control" type="text" name="sec" value="{{isset($reporteventamovil->sec)?$reporteventamovil->sec:old('sec')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>

<label for="estado_linea"> Estado Linea </label>
<input id="estado_linea" class="form-control" type="text" name="estado_linea" value="{{isset($reporteventamovil->estado_linea)?$reporteventamovil->estado_linea:old('estado_linea')}}" {{($modo=='Ver')?'readonly="readonly"':""}}>
<br>
</div>
@if (!($modo=='Ver'))
    <input class="btn btn-success" type="submit" value="{{$modo}} Datos">
@endif

<a class="btn btn-primary" href="{{ url('admin/reporte_venta_movil') }}">Regresar</a>
