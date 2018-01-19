<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Home') | Dortizconocer</title>


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('plugins/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('plugins/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('plugins/bootstrap_datetimepicker/bootstrap_datetimepicker.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet"/>
    <link href="{{ asset('plugins/fullcalendar-3.7.0/fullcalendar.min.css')}}" rel='stylesheet' />
    <link href="{{ asset('plugins/fullcalendar-3.7.0/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
</head>
<body>
<div id="dortizconocer_loader">
    <div class="cicle"><span></span> <span></span></div>
</div>
<div id="app">

    @include('layouts.nav')
    @yield('content')
    <br><br><br>
    <br><br><br>
    <br><br><br>

    {{--Start footer--}}
    <footer class="footer bg-primary">
        <div class="content container text-white"><br>
            <br>
            {!! Form::button('<i class="fab fa-facebook fa-2x"></i>', ['type' => 'button', 'class' => 'float-right btn btn-danger btn-circle', 'onclick' => "return confirm('Esta seguro de eliminar el registro?')"]) !!}

            Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
            Architecto at, atque autem dolores esse facere fuga fugiat incidunt iusto neque nulla numquam,
            <br>
            obcaecati optio praesentium quidem quo saepe velit vitae!
            <br>
        </div>
        <div class="col col-md-12 text-white text-center copyright">
            <strong>Dortizconocer </strong>Copyright &copy; {{ date('Y') }} Todos los derechos reservados
            <br>
            <img src="{{ asset('Logo.png') }}" alt="Dortizconocer" style="height: 50px;
  padding: 1px;
  width: auto;" />
        </div>
    </footer>
    {{--End footer--}}
</div>
<a href="#" class="btn btn-primary scrollup"><i class="fas fa-angle-up active"></i></a>
<!-- Scripts -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(window).on('load', function () {
        $("#dortizconocer_loader").delay(200).fadeOut("slow");
    });
</script>
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap_datetimepicker/moment.js') }}"></script>
<script src="{{ asset('plugins/fontawesome/svg-with-js/js/fontawesome-all.js') }}"></script>
<script src="{{ asset('plugins/bootstrap_datetimepicker/es.js') }}"></script>
<script src="{{ asset('plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@stack('scripts')
</body>
</html>
