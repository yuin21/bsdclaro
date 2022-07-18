<div class="form-group">
    <div class="row">
        <div class="col-6">
            <div class="d-flex">
                {!! Form::label('ruc', 'Ruc*') !!}
                <div id="cliente_loading" class="text-danger d-none" style="margin-left:10px;">
                    <span class="text-danger mr-2">
                        Buscando SUNAT
                    </span>
                    <div class="spinner-border text-danger float-rigth" role="status" id="spinner">
                    </div>
                </div>
            </div>
            <div class="input-group">
                {!! Form::text('ruc', null, ['class' => 'form-control']) !!}
                <button type="button" id="btnSearchCliente" class="btn btn-outline-secondary"
                    style="border-radius: 0 3px 3px 0; opacity: 0.8"><i class="fas fa-search"></i></button>
            </div>
            @error('ruc')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('razon_social', 'Razon Social*') !!}
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



