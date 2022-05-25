<div class="form-group">
    <div class="row">
        <div class="col-4">
            {!! Form::label('nom_personal', 'Nombre') !!}
            {!! Form::text('nom_personal', null, ['class' => 'form-control']) !!}

            @error('nom_personal')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            {!! Form::label('ape_paterno', 'Apellido paterno') !!}
            {!! Form::text('ape_paterno', null, ['class' => 'form-control']) !!}

            @error('ape_paterno')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            {!! Form::label('ape_materno', 'Apellido materno') !!}
            {!! Form::text('ape_materno', null, ['class' => 'form-control']) !!}
            @error('ape_materno')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">        
        <div class="col-12">
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
            {!! Form::label('celular', 'Celular') !!}
            {!! Form::text('celular', null, ['class' => 'form-control']) !!}
            @error('celular')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('email', 'Correo') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">        
        <div class="col-6">
            {!! Form::label('tipo_doc_iden', 'Tipo de documento') !!}
            {!! Form::select('tipo_doc_iden', $tipos_doc, null, ['class' => 'selectpicker form-control', 'title' => 'seleccionar']) !!}
            @error('tipo_doc_iden')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('nro_doc_iden', 'Número de documento') !!}
            {!! Form::text('nro_doc_iden', null, ['class' => 'form-control']) !!}
            @error('nro_doc_iden')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('tipo_personal', 'Tipo de Personal') !!}
            {!! Form::select('tipo_personal', ['Regular'=>'Regular','Senior'=>'Senior','SemiSenior'=>'SemiSenior'], null, ['class' => 'selectpicker form-control', 'title' => 'seleccionar']) !!}
            @error('tipo_personal')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('cargo', 'Cargo') !!}
            {!! Form::select('cargo', ['Consultor'=>'Consultor','Mesa de Control'=>'Mesa de Control'], null, ['class' => 'selectpicker form-control', 'title' => 'seleccionar']) !!}
            @error('cargo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

