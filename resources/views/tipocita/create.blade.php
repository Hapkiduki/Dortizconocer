@extends('layouts.app')

@section('title', 'Tipo Cita')

@section('content')
    <br><br><br>
    <div class="container">
        <div class="row align-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white"><h3 class="text-center">Crear tipo de cita</h3></div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'tipocita.store']) !!}
                        {{csrf_field()}}
                        @include('tipocita.fields')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
