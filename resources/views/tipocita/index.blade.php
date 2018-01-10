@extends('layouts.app')

@section('title', 'Tipo Cita')

@section('content')
    <br><br><br>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 col-md-offset-3">
                @if (session('status'))
                    <div class="alert alert-dismissible alert-{!! session('status')[0] !!}">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">{{ session('status')[1] }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white"><h3 class="text-center">Tipo de citas</h3></div>
                    <div class="card-body">
                        <a href="{{ route("tipocita.create")}}" class="btn btn-primary">Nuevo</a>
                        <br><br>
                        <table class="table table-responsive" id="tipocitas-table">
                            <thead>
                            <th>Descripcion</th>
                            <th colspan="3">Acción</th>
                            </thead>
                            <tbody>
                            @forelse($tipocitas as $tipocita)
                                <tr>
                                    <td>{!! $tipocita->descripcion !!}</td>
                                    <td>
                                        {!! Form::open(['route' => ['tipocita.destroy', $tipocita->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            {{--<a href="{!! route('tipocita.show', [$tipocita->id]) !!}"
                                               class='btn btn-default btn-xs'><i
                                                        class="fas fa-eye-open"></i></a>--}}
                                            <a href="{!! route('tipocita.edit', [$tipocita->id]) !!}"
                                               class='btn btn-default btn-xs'><i
                                                        class="fas fa-edit"></i></a>
                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <h3 class="text-center text-danger">No hay registros
                                            disponibles</h3>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $tipocitas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
    </script>
@endpush