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
    /**
     * @var GetBeersByIdUseCase
     */
    private $getBeersById;

    public function __construct(BeerRepository $beerRepo, GetBeersByFoodUseCase $getBeersByFood, GetBeersByIdUseCase $getBeersById)
    {
        $this->beerRepository = $beerRepo;
        $this->getBeersByFood = $getBeersByFood;
        $this->getBeersById = $getBeersById;
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
        $response = $this->getBeersById->execute($id);

        return new JsonResponse([
            'response' => $response,
            'Status' => 'OK',
            Response::HTTP_OK,
        ]);
    }
}
