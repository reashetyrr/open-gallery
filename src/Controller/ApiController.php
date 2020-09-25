<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/{route}", name="api")
     */
    public function index(Request $request)
    {
        $page = $request->query->get('page');
        // grab all albums and possibly all media matching the route
        return new JsonResponse([]);
    }
}
