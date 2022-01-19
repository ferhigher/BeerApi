<?php

namespace App\Repositories;

use App\Infrastructure\HttpClient;
use App\Model\Beer;
use GuzzleHttp\Client;

class BeerRepository
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    public function filterByFood($food): array
    {
        $beersResponse = $this->client->requestBeers(['food' => $food]);
        $beers = [];
        foreach ($beersResponse as $beer) {
            $beers [] = new Beer($beer['id'], $beer['name'], $beer['description'],
                $beer['image_url'], $beer['tagline'], $beer['first_brewed']);
        }
        return $beers;

    }

    public function findById(int $id)
    {
        return $this->client->requestBeer($id);
    }

}