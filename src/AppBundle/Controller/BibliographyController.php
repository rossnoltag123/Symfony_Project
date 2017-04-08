<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bibliography;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class BibliographyController
 * @package AppBundle\Controller
 * @Route("/")
 */
class BibliographyController extends Controller
{
    /*-------------------------------------------------------------------------------------------------------------------*/
    /**
     * @Route("/Bibliography/" , name="homepage")
     */
    public function indexAction(){
        $nameIndexArray = [
          'name' => 'Ross'
        ];

        $templateName = 'index';

        return $this->render($templateName.'.html.twig',$nameIndexArray);
    }

    /*-------------------------------------------------------------------------------------------------------------------*/
    /**
     * @Route("/Bibliography/login" , name="login")
     */
    public function loginAction(){
        $nameIndexArray = [
            'name' => 'Login'
        ];
        $templateName = 'login';

        return $this->render($templateName.'.html.twig',$nameIndexArray);
    }

    /*-------------------------------------------------------------------------------------------------------------------*/
    /**
     * @Route("/Bibliography/database_Add" )
     */
    public function databaseAction()//order of route...
    {//adding to database

        $bib = new Bibliography();
        $bib->setName('Ross');
        $bib->setDif('Test');

        $entityManager = $this->getDoctrine()->getManager();//get  Entity manager
        $entityManager->persist($bib);//tell to save
        $entityManager->flush();// commit to the addition

        return new Response('<html><body>Added Ross to database</body></html>');
    }

    /*-------------------------------------------------------------------------------------------------------------------*/


//    /**
//     * @Route("/Bibliography/{wildcard}")
//     */
//    public function showAction($wildcard)
//    {
//        return $this->render('Bibliography/login.html.twig', [
//            'name'=>$wildcard
//        ]);
//    }


    /*-------------------------------------------------------------------------------------------------------------------*/
    //JSON response + route generation---------Displaying database info
//    /**
//     * @Route("/Bibliography/{wildcard}/notes" , name="databaseInfo")
//     * @Method("GET")
//     */
//    public function getJsonAction()
//    {
//        $notes = [
//          ['id' =>1, 'username' => 'Ross', 'notes'=> ' Latest technology in 3d accelerated hardware'],
//          ['id' =>2, 'username' => 'Ross', 'notes'=>   'A study on the latest in game graphics'],
//            ['id' =>3, 'username' => 'Ross', 'notes'=>  'latest in game'],
//        ];
//
//        $data = [
//            'notes' => $notes
//        ];
//
//        return new JsonResponse($data);
//    }
}