@extends('layouts.app')

@section('title', 'Citas')

@section('content')
<br>

<div class="container">
    @if (session('status'))
        <ul class="alert alert-{!! session('status')[0] !!}">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status')[1] }}
        </ul>
    @endif
    
    @auth
    <a href="{{ route('mis_citas') }}" class="btn btn-primary float-right">Mis Citas</a>
    <div class="col-sm-11">
        <a href="{{ route('bookings') }}" class="btn btn-warning float-right">Mis reservas</a>
    </div>
    <br>
    <br>
    <br>
    @endauth
</div>
<div class="card mx-auto" style="width: 80rem;">
    <div class="card-body">
        <h5 class="card-title text-center">Reserva</h5>
        <h6 class="card-subtitle mb-2 text-muted text-center">Agenda tu cita</h6>
        <p class="card-text text-center">
            Agenda tu cita hoy, confirma el pago y seras contactado en breve por un especialista.
        </p>


        {!! Form::open(['route' => 'citas.store', 'class' => 'form-horizontal']) !!}
            <div class="container">
                <div class="row">
                    <div class="col">
                            <div class="col-sm-10 form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                {!!  Form::label('descripcion', 'Descripción') !!}
                                {!! Form::textarea('descripcion',null,['class'=>'form-control', 'rows' => 2]) !!}
                                @if ($errors->has('descripcion'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('descripcion') }}</strong></span>
                                @endif
                            </div>
                    </div>
                    <div class="col">
                            <div class="col-sm-6 form group{{ $errors->has('tipo_cita_id') ? ' has-error' : '' }}">
                                {!!  Form::label('tipo_cita_id', 'Tipo de cita') !!}
                                {!! Form::select('tipo_cita_id', $tipo_citas, null, ['class' => 'form-control select2','placeholder' => '[ Seleccione una opción... ]']); !!}
                                @if ($errors->has('tipo_cita_id'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('tipo_cita_id') }}</strong></span>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col">
                                <div class="form group{{ $errors->has('tipo') ? ' has-error' : '' }} ">
                                    <label>{!! Form::radio('tipo', 'llamada') !!} Llamada</label>&nbsp;&nbsp;&nbsp;
                                    <label>{!! Form::radio('tipo', 'videollamada') !!} Videollamada</label>
                                    @if ($errors->has('tipo'))
                                        <span class="help-block text-danger"><strong>{{ $errors->first('tipo') }}</strong></span>
                                    @endif
                                </div>                
                        </div>
                        <div class="col">
                                <div class="col-sm-8 form group{{ $errors->has('fec_hora') ? ' has-error' : '' }}">
                                    {!!  Form::label('fec_hora', 'Fecha de cita') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fas fa-calendar-alt"></span>
                                        </span>
                                        {!!  Form::text('fec_hora', null, ['class' => 'form-control datetimepicker', 'placeholder' => date("Y-m-d"), 'required']) !!}
                        
                                    </div>
                                    @if ($errors->has('fec_hora'))
                                        <span class="help-block text-danger"><strong>{{ $errors->first('fec_hora') }}</strong></span>
                                    @endif
                                </div>
                        </div>
                        <div class="col">
                            <div class="col-sm-8 form group{{ $errors->has('fec_hora') ? ' has-error' : '' }}">
                                {!!  Form::label('fec_hora', 'Fecha de cita') !!}
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="fas fa-calendar-alt"></span>
                                    </span>
                                    {!!  Form::text('fec_hora', null, ['class' => 'form-control datetimepicker', 'placeholder' => date("Y-m-d"), 'required']) !!}
                    
                                </div>
                                @if ($errors->has('fec_hora'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('fec_hora') }}</strong></span>
                                @endif
                            </div>
                                {!! Form::hidden('intervalo') !!}
                        </div>
                </div>
                <div class="row">
                        <div class="col">
                            <div class="col-sm-8 form group{{ $errors->has('hora_ini') ? ' has-error' : '' }}">
                                {!!  Form::label('hora_ini', 'Hora de cita') !!}
                                <select name="hora_ini" id="hora_ini" class="form-control">
                                    <option selected="selected" value="">[ Seleccione una opción... ]</option>
                                </select>
                                @if ($errors->has('hora_ini'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('hora_ini') }}
                                        </strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <br>
                            {!! Form::submit('Reservar', ['class' => 'card-link btn btn-primary float-right']) !!}
                        </div>
                </div>
            </div>
        {!! Form::close() !!}  

    </div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $.get('api/citas/disponibilidad_cita', function (data) {

                console.log(moment().hour(0).minutes(0));
                let days_of_week = [0, 1, 2, 3, 4, 5, 6];
                let enabled_days_of_week = data.toString();
                var disabled_days_of_week = [];
                $.each(days_of_week, function (value) {
                    if (!enabled_days_of_week.includes(value)) {
                        disabled_days_of_week.push(value);
                    }
                });


                $('input.datetimepicker').datetimepicker({
                    format: 'YYYY-MM-DD',
                    useCurrent: false,
                    locale: 'es',
                    daysOfWeekDisabled: disabled_days_of_week,
                    minDate: new Date(),
                    disabledDates: ['2017-11-25', '2017-11-26']
                });
            });

            $(".datetimepicker").on("dp.change", function () {
                let fecha_seleccionada = $("input#fec_hora").val();
                var dia = {};
                dia.dia_s = new Date(fecha_seleccionada).getUTCDay();
                dia.fecha = fecha_seleccionada;
                $.get('api/citas/disponibilidad_hora/' + JSON.stringify(dia), function (data) {
                    //console.log(data[0])
                    $("select#hora_ini option").remove();
                    $("input[name=intervalo]").val(data[1]);
                    $("select#hora_ini").append('<option selected="selected" value="">[ Seleccione una opción... ]</option>');
                    $.each(data[0], function (index, value) {
                        $("select#hora_ini").append('<option value=' + value + '>' + value + '</option>');
                    });
                });
            });

        });

    </script>
@endpush