<?php

namespace App\Model;

use GuzzleHttp\Client;

class Beer
{

    public function all($param)
    {
        $client = new Client([
            'base_uri' => 'https://api.punkapi.com/v2/'
        ]);

        $response = $client->request('GET', 'beers', [
            'query' => ['food' => $param]
        ]);
        return $response->getBody()->getContents();
    }

    public function find(int $id)
    {

        $client = new Client([
            'base_uri' => 'https://api.punkapi.com/v2/'
        ]);
        $response = $client->request('GET', "beers/{$id}");
        return $response->getBody()->getContents();
    }
}