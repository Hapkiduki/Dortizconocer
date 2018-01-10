@extends('layouts.app')

@section('title', 'Crear Horario')

@section('content')
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white"><h3 class="text-center">Actualizar Horario</h3></div>
                    <div class="card-body">
                        {!! Form::model($schedule, ['route' => ['horarios.update', $schedule->id], 'method' => 'patch']) !!}
                        {{csrf_field()}}
                        @include('horarios.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
