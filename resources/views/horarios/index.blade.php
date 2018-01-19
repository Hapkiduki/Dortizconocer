@extends('layouts.app')

@section('title', 'Horarios')

@section('content')
    <br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                @if (session('status'))
                    <ul class="alert alert-{!! session('status')[0] !!}">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status')[1] }}
                    </ul>
                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white"><h3 class="text-center">Horarios Disponibles</h3>
                    </div>
                    <div class="card-body">
                        @forelse($schedules as $schedule)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Desde:</strong> {{date("g:i a",strtotime($schedule->hora_ini))}}
                                </li>
                                <li class="list-group-item">
                                    <strong>Hasta:</strong> {{ date("g:i a",strtotime($schedule->hora_fin))}}</li>
                                <li class="list-group-item"><strong>Días:</strong>
                                    {{--count(explode(',',$schedule->dias))--}}
                                    <ul class="list-inline">
                                        @foreach($schedule->dias as $dia)
                                            <li>{{$dia}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="list-group-item"><strong>Intervalo entre
                                        citas:</strong> {{$schedule->intervalo}} horas
                                </li>
                                <li class="list-group-item">
                                    <label class="control-label col-md-8">Acciones</label>
                                    {!! Form::open(['route' => ['horarios.destroy', $schedule->id], 'method' => 'delete']) !!}
                                    {{csrf_field()}}
                                    <a href="{!! route('horarios.edit', [$schedule->id]) !!}"
                                       class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                    {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro de eliminar el registro?')"]) !!}
                                    {!! Form::close() !!}
                                </li>

                            </ul>
                            <br>
                        @empty
                            <ul class="list-group">
                                <li class="list-group-item"><h3 class="text-center text-danger">No hay horarios
                                        disponibles</h3></li>
                            </ul>
                        @endforelse
                        <div class="row justify-content-center">

                            {{$schedules->render()}}
                        </div>

                    </div>
                    <div class="card-footer"><a href="{{ route("horarios.create")}}"
                                                class="btn btn-primary d-block mx-auto">Crear
                            horario
                            de
                            programación</a></div>
                </div>
            </div>

        </div>
        {{--{{ $paginator->links('view.name') }}--}}

    </div>


@endsection

@push('scripts')
    <script>
    </script>
@endpush