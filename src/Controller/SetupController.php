<?php

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;

class SetupController extends AbstractController
{
    /**
     * @Route("/setup", name="setup")
     */
    public function index(Request $request)
    {
        if ($this->is_connected()) {
            return $this->redirect('/');
        }
        $data = $request->request->all();

        if (count($data) > 0) {
            $this->create_env($data);
            return $this->redirectToRoute('setup_admin');
        }
        return $this->render('setup/index.html.twig', [
            'controller_name' => 'SetupController',
        ]);
    }

    /**
     * @Route("/setup/administrator", name="setup_admin")
     */
    public function setupAdmin(Request $request) {
        if ($this->is_connected()) {
            return $this->redirect('/');
        }
        return $this->render('setup/admin.html.twig');
    }

    private function is_connected() {
        try {
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->connect();
            $em->getRepository(User::class)->findAll();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    private function create_env($data) {
        $env_location = '../.env';
        $filesystem = new Filesystem();

        $data['app_secret'] = bin2hex(random_bytes(16));

        $template_result = $this->renderView('setup/config_templates/template.env', $data);
        $filesystem->dumpFile($env_location, $template_result);
    }
}
