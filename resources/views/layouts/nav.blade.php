



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('Logo.png') }}" alt="Dortizconocer" style="height: 50px;
  padding: 1px;
  width: auto;" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) === null ? 'active text-white' : null }}" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) === 'servicios' ? 'active text-white' : null }}" href="{{ url('servicios') }}">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) === 'pagos' ? 'active text-white' : null }}" href="{{ url('pagos') }}">Pagos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) === 'videollamada' ? 'active text-white' : null }}" href="{{ url('videollamada') }}">Videollamada</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::segment(1) === 'horarios' ? 'active text-white' : null }}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Configuración</a>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="{{ url('horarios') }}">Horario</a>
                    <a class="dropdown-item" href="{{ url('tipocita') }}">Tipos de cita</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) === 'citas' ? 'active text-white' : null }}" href="{{  route('citas.index') }}">Reserva tu cita</a>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0 nav-pills">
            @guest
                <li class="nav-item"><a class="nav-link {{ Request::segment(1) === 'login' ? 'active text-white' : null }}" href="{{ route('login') }}">Ingresar</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::segment(1) === 'register' ? 'active text-white' : null }}" href="{{ route('register') }}">Registrarse</a></li>
                @else

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} </a>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @endguest
        </ul>

    </div>
</nav>


{{--<li class="{{ Request::segment(1) === null ? 'active text-white' : null }}"><a href="{{ url('/') }}">Inicio</a></li>--}}
{{--<li class="{{ Request::segment(1) === 'servicios' ? 'active text-white' : null }}"><a href="{{ url('servicios') }}">Servicios</a></li>--}}
