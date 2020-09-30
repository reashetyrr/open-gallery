<?php

namespace App\Controller;

use App\Entity\Setting;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class zzMainController extends BaseController
{
    /**
     * @Route("/{route}", requirements={"route"=".*"}, name="main")
     */
    public function index($route)
    {
        // this is a check to see if the database has been connected (aka setup) and if the admin user has been created
        if (!$this->is_connected()) return $this->redirectToRoute('setup');

        $auth_settings = $this->getDoctrine()->getRepository(Setting::class)->findOneBy(['setting_type' => 'account_required']);

        if ($auth_settings->getSettingValue() === '1' && !$this->getUser()) return $this->redirectToRoute('app_login');

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'route' => $route
        ]);
    }
}
