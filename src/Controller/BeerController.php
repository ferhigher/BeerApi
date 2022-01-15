<?php

namespace App\Controller;

use App\Model\Beer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    /**
     * @var Beer
     */
    private $beer;

    public function __construct(Beer $beer)
    {
        $this->beer = $beer;
    }

    /**
     * @Route("/beers", name="beers")
     */
    public function index(Request $request): JsonResponse
    {
        $param = $request->query->get('food');
        $beers = $this->beer->all($param);

        return new JsonResponse([
            'response' => $beers,
            'Status' => 'OK',
            Response::HTTP_OK,
        ]);
    }

    /**
     * @Route("/beer/{id}", name="beer", methods={"GET"})
     */
    public function show(int $id): JsonResponse
    {
        $beer = $this->beer->find($id);

        return new JsonResponse([
            'response' => $beer,
            'Status' => 'OK',
            Response::HTTP_OK,
        ]);
    }
}
