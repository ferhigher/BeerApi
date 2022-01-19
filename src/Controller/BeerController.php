<?php

namespace App\Controller;

use App\Repositories\BeerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    /**
     * @var BeerRepository
     */
    private $beerRepository;

    /** @var GetBeersByFoodUseCase */
    private $getBeersByFood;

    public function __construct(BeerRepository $beerRepo, GetBeersByFoodUseCase $getBeersByFood)
    {
        $this->beerRepository = $beerRepo;
        $this->getBeersByFood = $getBeersByFood;
    }

    /**
     * @Route("/beers", name="beers")
     */
    public function filter(Request $request): JsonResponse
    {

        $food = $request->query->get('food');
        $response = $this->getBeersByFood->execute($food);

        return new JsonResponse([
            'response' => $response,
            'Status' => 'OK',
            Response::HTTP_OK,
        ]);
    }

    /**
     * @Route("/beer/{id}", name="beer", methods={"GET"})
     */
    public function show(int $id): JsonResponse
    {
        $beer = $this->beerRepository->find($id);

        $beerView = [
            'id' => $beer[0]['id'],
            'name' => $beer[0]['name'],
            'description' => $beer[0]['description'],
            'image' => $beer[0]['image_url'],
            'tagline' => $beer[0]['tagline'],
            'first_brewed' => $beer[0]['first_brewed'],
        ];

        return new JsonResponse([
            'response' => $beerView,
            'Status' => 'OK',
            Response::HTTP_OK,
        ]);
    }
}
