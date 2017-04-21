<?php
/**
 * Created by PhpStorm.
 * User: Ross
 * Date: 20-Apr-17
 * Time: 1:44 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Route("/admin")
 */
class AdminController extends Controller
{

    /**
     * @Route("/", name="admin_index")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction()
    {

//        $session = new Session();
//
//        if($session->has ('user')){
//            $templateName = '/admin/index';
//            return $this->render($templateName.'.html.twig',[]);
//        }
//
//        $session->getFlashBag()->clear();
//        $this->addFlash(
//            'error',
//            'please login before accessing admin'
//        );
//
//        return $this->redirectToRoute('loginSymf');
//    }

        $templateName = '/admin/index';
        return $this->render($templateName . '.html.twig', []);
    }
}