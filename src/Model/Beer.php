<?php

namespace App\Model;

use GuzzleHttp\Client;

class Beer
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

    public function all($param)
    {
        $response = $this->client->request('GET', 'beers', [
            'query' => ['food' => $param]
        ]);
        return $response->getBody()->getContents();
    }

    public function find(int $id)
    {
        $response = $this->client->request('GET', "beers/{$id}");

        return $response->getBody()->getContents();
    }
}