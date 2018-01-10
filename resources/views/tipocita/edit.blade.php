@extends('layouts.app')

@section('title', 'Crear Horario')

@section('content')
    <br><br><br>
        <div class="container">
            <div class="row align-content-center">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary"><h3 class="text-center">Actualizar tipo de cita</h3></div>
                    <div class="card-body">
                        {!! Form::model($tipocita, ['route' => ['tipocita.update', $tipocita->id], 'method' => 'patch']) !!}
                            {{csrf_field()}}
                            @include('tipocita.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
