<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends BaseController
{
    /**
     * @Route("/", requirements={"route"=".*"}, name="main")
     */
    public function index($route)
    {
        // this is a check to see if the database has been connected (aka setup) and if the admin user has been created
        if (!$this->is_connected()) return $this->redirectToRoute('setup');


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'route' => $route
        ]);
    }
}
