<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    /**
     * @Route("/beers", name="beers")
     */
    public function index(Request $request): JsonResponse
    {
        $param = $request->query->get('food');

        $client = new Client([
            'base_uri' => 'https://api.punkapi.com/v2/'
        ]);

        $response = $client->request('GET', 'beers', [
            'query' => ['food' => $param]
        ]);
        $beers = $response->getBody()->getContents();

        return new JsonResponse([
            'response' => $beers,
            'Status' => 'OK',
            Response::HTTP_OK,
        ]);

    }
}
