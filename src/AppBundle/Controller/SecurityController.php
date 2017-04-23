<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lecturer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class SecurityController extends Controller
{
    /**
     * login form
     *
     * @Route("/loginlecturer", name="login")
     * @Method({"GET", "POST"})
     */
    public function loginAction(Request $request)
    {
        $session = new Session();
        $lecturer = new Lecturer();

        $form = $this->createForm('AppBundle\Form\LecturerType', $lecturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($this->canAuthenticate($lecturer)) {

                $session->set('lecturer', $lecturer);
            }else{
                    $this->addFlash(
                    'error',
                    'bad username or password, please try again'
                    );

                    $lecturer->setPassword('');
                    $form = $this->createForm('AppBundle\Form\LecturerType', $lecturer);
                }
        }

        $argsArray=[
            'lecturer' => $lecturer,
            'form' => $form->createView(),
            ];

        $templateName = 'loginlecturer';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @param Lecturer $lecturer
     * @return bool
     */
    public function canAuthenticate(Lecturer $lecturer)
    {
        $username = $lecturer->getUsername();
        $password = $lecturer->getPassword();

        return ('lecturer' == $username) && ('lecturer' == $password);
    }

    /**
     * login form
     *
     * @Route("/logoutlecturer", name="logout")
     * @Method({"GET", "POST"})
     */
    public function logoutAction(Request $request)
    {

    }
}