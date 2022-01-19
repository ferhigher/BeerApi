<?php

namespace App\Infrastructure;

use GuzzleHttp\Client;

class HttpClient
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.punkapi.com/v2/'
        ]);
    }

    public function requestBeers(array $filters): array
    {
        // Todo validacion de params
        $response = $this->client->request('GET', 'beers', [
            'query' => $filters
        ]);

        return json_decode($response->getBody(), true);

    }

    public function requestBeer($id)
    {
        $response = $this->client->request('GET', "beers/{$id}");

        return json_decode($response->getBody(), true);
    }

}