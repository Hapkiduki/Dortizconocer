<?php

namespace App\Repositories;

use GuzzleHttp\Client;


class Posts extends GuzzleHttpRequest
{
	/*protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;/*new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			// You can set any number of default request options.
			'timeout'  => 2.0,
		]);*/
	//}

	public function all()
	{
		/*$response = $this->client->request('GET', 'posts');
		return json_decode($response->getBody()->getContents());*/
		return $this->get('posts');
	}

	public function find($id)
	{
		/*$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			// You can set any number of default request options.
			'timeout'  => 2.0,
		]);

		$response = $client->request('GET', "posts/{$id}");
		return json_decode($response->getBody()->getContents());*/
		return $this->get("posts/{$id}");
	}

	/*protected function get($url)
	{
		$response = $this->client->request('GET', $url);
		return json_decode($response->getBody()->getContents());
	}*/
}