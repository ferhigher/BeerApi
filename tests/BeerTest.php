<?php

namespace App\Tests;

use App\Controller\GetBeersByFoodUseCase;
use App\Infrastructure\HttpClient;
use App\Repositories\BeerRepository;
use PHPUnit\Framework\TestCase;

class BeerTest extends TestCase
{

    public function testBeerFiltering(): void
    {
        $client = new HttpClient();
        $beerRepo = new BeerRepository($client);
        $getBeersByFood = new GetBeersByFoodUseCase($beerRepo);

        $food = 'carne_asada_with';
        $response = $getBeersByFood->execute($food);

        $this->assertEquals(3, count($response));
    }
}
