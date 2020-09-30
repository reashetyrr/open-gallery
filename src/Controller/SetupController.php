<?php

namespace App\Controller;


use App\Entity\Setting;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/s/setup")
 */
class SetupController extends BaseController
{
    /**
     * @Route("/", name="setup")
     */
    public function index(Request $request)
    {
        if ($this->is_connected()) {
            return $this->redirect('/');
        }
        $data = $request->request->all();

        if (count($data) > 0) {
            $this->create_env($data);
            return $this->redirectToRoute('setup_query');
        }
        return $this->render('setup/index.html.twig', [
            'controller_name' => 'SetupController',
        ]);
    }

    /**
     * @Route("/query", name="setup_query")
     */
    public function setupQuery(KernelInterface $kernel) {
        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'doctrine:migrations:migrate'
        ]);
        $input->setInteractive(false);

        $application->run($input);

        $basic_settings = [
            'site_name' => 'Open Gallery',
            'account_required' => '0',
            'theme' => 'default'
        ];

        $em = $this->getDoctrine()->getManager();
        foreach ($basic_settings as $type => $setting) {
            $sett =  new Setting();
            $sett->setSettingType($type);
            $sett->setSettingValue($setting);

            $em->persist($sett);
        }
        $em->flush();
        return $this->redirectToRoute('setup_admin');
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

                $roles = $user->getRoles();
                $roles []= 'ROLE_ADMINISTRATOR';
                $user->setRoles($roles);

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

    /**
     * @Route("/done", name="setup_done")
     */
    public function setupDone() {
        if (!$this->is_connected()) return $this->redirectToRoute('setup');

        $user = $this->getDoctrine()->getRepository(User::class)->findAll();
        if (!$user) return $this->redirectToRoute('setup_admin');

        return $this->render('setup/done.html.twig');
    }


    private function create_env($data) {
        $env_location = '../.env';
        $filesystem = new Filesystem();

        $data['app_secret'] = bin2hex(random_bytes(16));

        $template_result = $this->renderView('setup/config_templates/template.env', $data);
        $filesystem->dumpFile($env_location, $template_result);
    }
}
