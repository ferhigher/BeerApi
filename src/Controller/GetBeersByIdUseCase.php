<?php

namespace App\Controller;

use App\Repositories\BeerRepository;

class GetBeersByIdUseCase
{
    private $beerRepository;

    public function __construct(BeerRepository $beerRepo)
    {
        $this->beerRepository = $beerRepo;
    }

    public function execute(int $id): array
    {
        $beer = $this->beerRepository->findById($id);

        return [
            'id' => $beer[0]['id'],
            'name' => $beer[0]['name'],
            'description' => $beer[0]['description'],
            'image' => $beer[0]['image_url'],
            'tagline' => $beer[0]['tagline'],
            'first_brewed' => $beer[0]['first_brewed'],
        ];

    }

}