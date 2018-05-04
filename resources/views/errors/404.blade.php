<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Acceso restringido</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
	
</head>
<body>

 <div class="box-admin ">
	<div class="col-md-4 col-md-offset-4">
		<div class="card card-warning">
			<div class="card-heading">
				<div class="card-title">Acceso Restringido</div>
			</div>
			<div class="card-body">
				<img class="img-responsive center-block" src="{{ asset('img/error_access.png') }}">
				<hr>
				<strong class="text-center">
					<p class="text-center">Usted no tiene acceso a esta zona</p>
					<p>
						<a href="/">¿Desea regresar al inicio?</a>
					</p>
				</strong>
			</div>
		</div>
	</div>
</div>

</body>
</html>