<div class="form-group">
    {!! Form::label('cuota', 'Cuota') !!}
    {!! Form::text('cuota', null, ['class' => 'form-control']) !!}

    @error('cuota')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>