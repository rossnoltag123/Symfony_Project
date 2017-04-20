<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
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
     * @Route("/login", name="login")
     * @Method({"GET", "POST"})
     */
    public function loginAction(Request $request)
    {
        $session = new Session();
        $user = new User();

        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($this->canAuthenticate($user)) {

                $session->set('user', $user);
            }else{
                    $this->addFlash(
                    'error',
                    'bad username or password, please try again'
                    );

                    $user->setPassword('');
                    $form = $this->createForm('AppBundle\Form\UserType', $user);
                }
        }

        $argsArray=[
            'user' => $user,
            'form' => $form->createView(),
            ];

        $templateName = 'login';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function canAuthenticate(User $user)
    {
        $username = $user->getUsername();
        $password = $user->getPassword();

        return ('admin' == $username) && ('admin' == $password);
    }
}