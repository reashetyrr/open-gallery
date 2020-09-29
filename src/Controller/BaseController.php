<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;


class BaseController extends AbstractController
{
    protected function is_connected() {
        try {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->connect();
            $em->getRepository(User::class)->findAll();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
