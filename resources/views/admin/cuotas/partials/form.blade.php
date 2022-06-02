<div class="form-group">
    <div class="col-6 mx-auto">
    {!! Form::label('cuota', 'Cuota') !!}
    {!! Form::text('cuota', null, ['class' => 'form-control']) !!}

    @error('cuota')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
</div>