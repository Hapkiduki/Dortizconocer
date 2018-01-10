<?php

namespace App\Repositories;

use GuzzleHttp\Client;


class GuzzleHttpRequest
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;/*new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://jsonplaceholder.typicode.com',
			// You can set any number of default request options.
			'timeout'  => 2.0,
		]);*/
	}

	protected function get($url)
	{
		$response = $this->client->request('GET', $url);
		return json_decode($response->getBody()->getContents());
	}
}