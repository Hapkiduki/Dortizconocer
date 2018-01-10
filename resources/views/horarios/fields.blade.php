<div class="form-group{{ $errors->has('hora_ini') ? ' has-error' : '' }} col-md-3">
    {!!  Form::label('hora_ini', 'Desde') !!}
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon2"><i class="far fa-clock" aria-hidden="true"></i></span>
        {!!  Form::text('hora_ini', null, ['class' => 'form-control datetimepicker3', 'placeholder' => 'Hora Inicial', 'required']) !!}
    </div>
    @if ($errors->has('hora_ini'))
        <span class="help-block text-danger"><strong>{{ $errors->first('hora_ini') }}</strong></span>
    @endif
</div>
<div class="form-group{{ $errors->has('hora_fin') ? ' has-error' : '' }} col-md-3">
    {!!  Form::label('hora_fin', 'Hasta') !!}
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon2"><i class="far fa-clock" aria-hidden="true"></i></span>
        {!!  Form::text('hora_fin', null, ['class' => 'form-control datetimepicker3', 'placeholder' => 'Hora Final', 'required']) !!}
    </div>
    @if ($errors->has('hora_fin'))
        <span class="help-block text-danger"><strong>{{ $errors->first('hora_fin') }}</strong></span>
    @endif
</div>
<div class="form-group{{ $errors->has('intervalo') ? ' has-error' : '' }} col-md-2">
    {!!  Form::label('intervalo', 'Intervalo') !!}
    <div class="input-group">
        {{--<input type="number" class="form-control" name="intervalo"
               value="{!! isset($schedule->intervalo) ? $schedule->intervalo : '' !!}">--}}
        {!! Form::number('intervalo', null , ['class' => 'form-control']) !!}
        <span class="input-group-addon" id="basic-addon2">Horas</span>
    </div>
    @if ($errors->has('intervalo'))
        <span class="help-block text-danger"><strong>{{ $errors->first('intervalo') }}</strong></span>
    @endif
</div>
<div class="form-group{{ $errors->has('dias') ? ' has-error' : '' }} col-md-8">
    {!!  Form::label('dias', 'Días', ['class' => 'col-md-6']) !!}
    {!!  Form::select('dias[]', ['1'=>'Lunes',
        '2'=>'Martes',
        '3'=>'Miercoles',
        '4'=>'Jueves',
        '5'=>'Viernes',
        '6'=>'Sabado',
        '0'=>'Domingo',], isset($schedule->dias) ? explode(',', $schedule->dias) : '', ['class'=> 'select2', 'multiple', 'style' => 'width: 65%']) !!}
    @if ($errors->has('dias'))
        <span class="help-block text-danger"><strong>{{ $errors->first('dias') }}</strong></span>
    @endif
</div>
<br>
<br>
<div class="form-group align-right col-md-8 col-md-push-4">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('horarios.index') !!}" class="btn btn-warning">Cancelar</a>
</div>