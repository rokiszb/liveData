<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Services\UniversalHelper;
use Symfony\Component\HttpFoundation\JsonResponse;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function index(HttpClientInterface $client)
    {
        // $data = UniversalHelper::requestData($client, 0);
        // $HTMLTable = UniversalHelper::makeHTMLTable($data);
        return $this->render('front/index.html.twig', [
            // 'table' => $HTMLTable,
        ]);
    }
}
