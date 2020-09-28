<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/a/setup")
 */
class SetupController extends AbstractController
{
    /**
     * @Route("/", name="setup")
     */
    public function index(Request $request, KernelInterface $kernel)
    {
        if ($this->is_connected()) {
            return $this->redirect('/');
        }
        $data = $request->request->all();

        if (count($data) > 0) {
            $this->create_env($data);
            $application = new Application($kernel);
            $application->setAutoExit(false);

            $input = new ArrayInput([
                'command' => 'doctrine:migrations:migrate'
            ]);
            $input->setInteractive(false);

            $application->run($input);

            return $this->redirectToRoute('setup_admin');
        }
        return $this->render('setup/index.html.twig', [
            'controller_name' => 'SetupController',
        ]);
    }

    /**
     * @Route("/administrator", name="setup_admin")
     */
    public function setupAdmin(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        if ($this->is_connected()) {
            $user = $this->getDoctrine()->getRepository(User::class)->findAll();
            if ($user)
                return $this->redirect('/');

            $user = new User();
            $form = $this->createForm(RegistrationFormType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // encode the plain password
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirectToRoute('setup_done');
            }

            return $this->render('setup/admin.html.twig', [
                'form' => $form->createView()
            ]);
        }
        return $this->redirectToRoute('setup');
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
