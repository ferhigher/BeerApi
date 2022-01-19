<?php

namespace App\Tests;

use App\Controller\GetBeersByFoodUseCase;
use App\Repositories\BeerRepository;
use PHPUnit\Framework\TestCase;

class BeerTest extends TestCase
{
    /**
     * @var BeerRepository
     */
    private $beerRepository;
    /**
     * @var GetBeersByFoodUseCase
     */
    private $getBeersByFood;

    public function __construct(BeerRepository $beerRepo, GetBeersByFoodUseCase $getBeersByFood)
    {
        $this->beerRepository = $beerRepo;
        $this->getBeersByFood = $getBeersByFood;
    }
    public function testBeerFiltering(): void
    {
        $food = 'carne_asada_with';
        $response = $this->getBeersByFood->execute($food);

        $this->assertTrue(true);
    }
}
