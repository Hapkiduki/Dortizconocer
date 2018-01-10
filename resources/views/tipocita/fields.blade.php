<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }} col-md-3">
    {!!  Form::label('descripcion', 'Descripción') !!}
    <div class="input-group">
        {!!  Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción de la cita', 'required']) !!}
    </div>
    @if ($errors->has('descripcion'))
        <span class="help-block text-danger"><strong>{{ $errors->first('descripcion') }}</strong></span>
    @endif
</div>
<br>
<br>
<div class="form-group align-right col-md-8 col-md-push-4">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tipocita.index') !!}" class="btn btn-warning">Cancelar</a>
</div>
