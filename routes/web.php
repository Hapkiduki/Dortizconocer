<?php
//use GuzzleHttp\Client;

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
Route::resource('horarios', 'ScheduleController', ['except' => 'show']/*, ['except' => 'show', 'create', 'edit']*/);
Route::resource('tipocita', 'TipoCitaController', ['except' => 'show']/*, ['except' => 'show', 'create', 'edit']*/);

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
