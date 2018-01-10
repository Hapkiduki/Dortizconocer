
{{--<div id="wrapper">--}}

@extends('layouts.app')

@section('title', "Servicios")

@section('content')
    <br><br><br>
        <div class="card col-sm-6">
            <div class="card-header bg-primary text-white">
                {!! $post->title !!}
            </div>
            <div class="card  card-body">
                {!! $post->body !!}
            </div>
        </div>
        <br>
<a class="btn btn-primary" href="{{ url()->previous() }}">Regresar</a>

@endsection