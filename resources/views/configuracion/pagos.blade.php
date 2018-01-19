@extends('layouts.app')

@section('title', "Pagos")

@section('content')
	<br><br><br>
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">Pagos</h2>

					@foreach($posts as $post)
						<div class="card">
							<div class="card bg-default card-body">
								<a href="{{ url('Api', [$post->id]) }}">
									{!! $post->title !!}
								</a>
							</div>
						</div>
						<br>
					@endforeach

				</div>
			</div>
		</div>
	</section>
@endsection