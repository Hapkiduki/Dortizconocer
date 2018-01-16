@extends('layouts.app')

@section('title', "Mis Reservas")
@section('content')
<div class="container">
	<div class="row">
		@for($i = 0; $i < 10; $i++)
		<div class="col-sm-4">
			<br><br>

			<div class="card">
			<div class="card-header bg-primary text-white">
				<h3>Reserva: </h3><label>Terapia en pareja</label>
			</div>
			<div class="card-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
					A, accusamus aliquid at atque beatae fuga illum in laboriosam
					minus nesciunt optio, pariatur perferendis praesentium quidem,
					quis soluta tempora veniam vitae!</p>
			</div>
			<div class="card-footer">
				<form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
					<input name="merchantId"    type="hidden"  value="508029"   >
					<input name="accountId"     type="hidden"  value="512321" >
					<input name="description"   type="hidden"  value="Test PAYU"  >
					<input name="referenceCode" type="hidden"  value="TestPago" >
					<input name="amount"        type="hidden"  value="20000"   >
					<input name="tax"           type="hidden"  value="0"  >
					<input name="taxReturnBase" type="hidden"  value="0" >
					<input name="currency"      type="hidden"  value="COP" >
					<input name="signature"     type="hidden"  value="{{ md5("4Vj8eK4rloUd272L48hsrarnUA~508029~TestPago~20000~COP") }}"  >
					<input name="test"          type="hidden"  value="1" >
					<input name="buyerEmail"    type="hidden"  value="sistemas@beltcolombia.com" >
					<input name="responseUrl"    type="hidden"  value="{{ route('response') }}" >
					<input name="confirmationUrl"    type="hidden"  value="{{ route('confirmation') }}" >
					<input name="Submit" type="submit" class="btn btn-warning btn-sm float-right" value="Pagar">
				</form>
			</div>
		</div>
		</div>
		@endfor

	</div>
</div>
@endsection