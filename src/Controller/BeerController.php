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
    public function filter(Request $request): JsonResponse
    {
        $param = $request->query->get('food');
        $beers = $this->beer->filter($param);
        $response = array();
        foreach ($beers as $beer) {
            $beerView = [
                'id' => $beer['id'],
                'name' => $beer['name'],
                'description' => $beer['description'],
            ];
            $response[] = $beerView;
        }

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
        $beer = $this->beer->find($id);

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
