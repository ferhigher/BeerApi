<?php

namespace App\Controller;

use App\Repositories\BeerRepository;

class GetBeersByFoodUseCase
{
    private $beerRepository;

    public function __construct(BeerRepository $beerRepo)
    {
        $this->beerRepository = $beerRepo;
    }

    public function execute(string $food): array
    {
        $beers = $this->beerRepository->filterByFood($food);
        $beerViews = array();
        foreach ($beers as $beer) {
            $beerView = [
                'id' => $beer->getId(),
                'name' => $beer->getName(),
                'description' => $beer->getDescription(),
            ];
            $beerViews[] = $beerView;
        }
        return $beerViews;

    }
}