<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as Guzzlereq;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('citas', 'AppoinmentController', ['only' => [
    'index', 'store'
]]);

Route::get('citas/myAppoinments', 'AppoinmentController@myAppoinments')->name('mis_citas');

Route::get('citas/my_current_appointments', 'AppoinmentController@my_current_appointments');

Route::view('pagos', 'front.pagos');
Route::view('servicios', 'front.servicios');
Route::view('videollamada', 'front.videollamada');

Route::group(['middleware' => ['is_admin']], function () {
    Route::resource('horarios', 'ScheduleController', ['except' => 'show']/*, ['except' => 'show', 'create', 'edit']*/);
    Route::resource('tipocita', 'TipoCitaController', ['except' => 'show']/*, ['except' => 'show', 'create', 'edit']*/);
});

Route::get('citas/booking', 'AppoinmentController@bookings')->name("bookings");

/*Route::get('Api', function (){
	$client = new Client([
		// Base URI is used with relative requests
		'base_uri' => 'https://jsonplaceholder.typicode.com',
		// You can set any number of default request options.
		'timeout'  => 2.0,
	]);

	$response = $client->request('GET', 'posts');
	$posts =  json_decode($response->getBody()->getContents());
	return view('front.pagos', compact("posts"));
});*/

Route::get('Api', 'HomeController@api');
Route::get('Api/{id}', 'HomeController@show');

/*Route::get('Api/{id}', function (){
	$client = new Client([
		// Base URI is used with relative requests
		'base_uri' => 'https://jsonplaceholder.typicode.com',
		// You can set any number of default request options.
		'timeout'  => 2.0,
	]);

	$response = $client->request('GET', 'posts');
	$posts =  json_decode($response->getBody()->getContents());
	return view('front.pagos', compact("posts"));
});*/

/*
 * Payu Routes
 */

Route::get('api/response', function (Request $request){
	$data = $request['merchantId'];
	echo "<pre>",print_r($data),"</pre>";
})->name('response');

Route::get('api/confirmation', function (Request $request){
	dd($request);
})->name('confirmation');
//Route::post('api/payu', function (){
Route::get('api/payu', function (){
	$apikey = "p1fkjA6N0yv1Mt2RZxZ4XnA4aB";
	$datos = [
		"merchantId" => "697831",
		"accountId" => "512321",
		"description" => "Test PAYU",
		"referenceCode" => "TestPayU",
		"amount" => "20000",
		"tax" => "0",
		"taxReturnBase" => "0",
		"currency" => "COP",
		"signature" => md5("p1fkjA6N0yv1Mt2RZxZ4XnA4aB~697831~TestPayU~20000~COP"), //Corresponsiente “ApiKey~merchantId~referenceCode~amount~currency”.
		"test" => "1",
		"buyerFullName" => "Andrew Corrales",
		"buyerEmail" => "sistemas@beltcolombia.com",
		"responseUrl" => route('response'),
		"confirmationUrl" =>  route('confirmation'),
	];

//dd($datos);

	$client = new Client([
		//'headers' => [ 'Content-Type' => 'application/json' ]
		'allow_redirects' => true,
		'headers' => [ 'Content-Type' => 'application/form-data' ]
	]);
	//f48e57b767385576cb9550818761a0c0

	$response = $client->post('https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu',
		['form_params' => $datos
		]
	);
	/*$request = new Guzzlereq(
		"POST",
		"https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu",
		$headers,
		$datos);*/
	//$response2 = $client->send($response);
//return redirect("api/response");
	//return re;
	//return $response2->getBody();
	echo print_r($response->getBody());
});

