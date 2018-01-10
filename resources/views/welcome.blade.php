@extends('layouts.app')

@section('content')
    {{--<video autoplay loop class="fillWidth">
        <source src="{{ asset('content_resources/Mp4/Relaxation.mp4') }}" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
        <source src="{{ asset('content_resources/Webm/Relaxation.webm') }}" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
    </video>
    <div class="poster hidden">
        <img src="{{ asset('img/slider/Relaxation.jpg') }}" alt="">
    </div>--}}

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                <img class="d-block img-responsive img-fluid" src="{{ asset('img/slider/friends.jpg') }}"
                     alt="First slide" >
                <div class="carousel-caption d-none d-md-block bg-primary" style="opacity: 0.9">
                    <h3><strong>Te acompañamos!</strong></h3>
                    <p>Porque nuestro enfoque <strong>eres tú</strong>, tenemos los profesionales adecuados para
                        atender tus necesidades.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-responsive img-fluid" src="{{ asset('img/slider/partner.jpg') }}"
                     alt="Second slide">
                <div class="carousel-caption d-none d-md-block bg-primary " style="opacity: 0.9">
                    <h3><strong>Queremos conocerte</strong></h3>
                    <p>Cuentanos lo que quieras, como a un amigo. Queremos que tu experiencia sea tranquila y confiada.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-responsive img-fluid" src="{{ asset('img/slider/help.jpg') }}"
                     alt="Third slide">
                <div class="carousel-caption d-none d-md-block bg-primary" style="opacity: 0.9">
                    <h3><strong>Se libre!</strong></h3>
                    <p>Puedes hablar libremente con nosotros, estamos dispuestos a escucharte y
                        ayudarte, además cada sesión es totalmente privada.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="jumbotron">
        <h1 class="display-3">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
    </div>
    <div class="container">
        <div class="row">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda at commodi debitis rem
                tempora.
                Autem doloremque ducimus eaque eligendi nam natus porro quaerat, quasi qui, quod recusandae tempora
                voluptates!</p>
        </div>
    </div>
@endsection
