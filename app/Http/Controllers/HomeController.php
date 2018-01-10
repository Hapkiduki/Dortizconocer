<?php

namespace App\Http\Controllers;

use App\Repositories\Posts;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class HomeController extends Controller
{
	protected $posts; //Variable para instanciar la clase Posts
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Posts $posts)
    {
        $this->middleware('auth');
        $this->posts = $posts;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

	public function api()
	{
		/*$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			// You can set any number of default request options.
			'timeout'  => 2.0,
		]);

		$response = $client->request('GET', 'posts');
		$posts =  json_decode($response->getBody()->getContents());*/
		$posts =  $this->posts->all();
		return view('front.pagos', compact("posts"));
    }

	public function show($id)
	{
		$post =  $this->posts->find($id);
		return view('front.servicios', compact("post"));
    }

}
