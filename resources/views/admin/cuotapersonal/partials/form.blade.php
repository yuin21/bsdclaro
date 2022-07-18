<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('bsd_personal_id', 'Personal') !!}
            {!! Form::select('bsd_personal_id', $personal, null, ['class' => 'selectpicker form-control', 'title' => 'seleccionar']) !!}
            
            @error('bsd_personal_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('bsd_cuota_id', 'Cuota') !!}
            {!! Form::select('bsd_cuota_id', $cuota, null, ['class' => 'selectpicker form-control', 'title' => 'seleccionar']) !!}
            
            @error('bsd_cuota_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-6">
            {!! Form::label('mes', 'Mes') !!}
            {!! Form::text('mes', null, ['class' => 'form-control', 'id'=>'mes']) !!}
        
            @error('mes')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            {!! Form::label('año', 'Año') !!}
            {!! Form::text('año', null, ['class' => 'form-control', 'id'=>'año']) !!}
        
            @error('año')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
