<div class="form-group">
    <div class="row">
        <div class="col-6">
        {!! Form::label('ruc', 'Ruc') !!}
        {!! Form::text('ruc', null, ['class' => 'form-control']) !!}

        @error('ruc')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="col-6">
            {!! Form::label('razon_social', 'Razon Social') !!}
            {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}

        @error('razon_social')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('num_celular', 'Número celular') !!}
            {!! Form::text('num_celular', null, ['class' => 'form-control']) !!}
        
            @error('num_celular')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> 
        <div class="col-6">
            {!! Form::label('direccion', 'Dirección') !!}
            {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

             @error('direccion')
            <span class="text-danger">{{ $message }}</span>
             @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('departamento', 'Departamento') !!}
             {!! Form::text('departamento', null, ['class' => 'form-control']) !!}

            @error('departamento')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> 
        <div class="col-6">
            {!! Form::label('provincia', 'Provincia') !!}
            {!! Form::text('provincia', null, ['class' => 'form-control']) !!}

             @error('provincia')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('distrito', 'Distrito') !!}
            {!! Form::text('distrito', null, ['class' => 'form-control']) !!}

            @error('distrito')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> 
        <div class="col-6">
            {!! Form::label('tipo_cliente', 'Tipo de Cliente') !!}
            {!! Form::select('tipo_cliente',$tipos_cliente, null, ['class' => 'selectpicker form-control', 'title' => 'seleccionar']) !!}
             @error('tipo_cliente')
                <span class="text-danger">{{ $message }}</span>
             @enderror
        </div>
    </div>
</div>



