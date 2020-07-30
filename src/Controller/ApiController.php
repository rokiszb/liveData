<?php

namespace App\Controller;

use App\Services\UniversalHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/data/{page}", name="api_data")
     */
    public function getData(HttpClientInterface $client, $page)
    {
        $filtered['data'] = UniversalHelper::requestData($client, $page);

        return new JsonResponse($filtered);
    }
}
