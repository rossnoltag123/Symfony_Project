<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bibliography;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;


use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class BibliographyController
 * @package AppBundle\Controller
 * @Route("/")
 */
class BibliographyController extends Controller
{
    /*----------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------HomePage---------------------------------------------------------*/

    /**
     * @Route("/Bibliography/" , name="homepage")
     */
    public function indexAction(Request $request)
    {
        $nameIndexArray = [
            'name' => 'Ross'
        ];

        $templateName = 'index';

        return $this->render($templateName . '.html.twig', $nameIndexArray);
    }

    /*----------------------------------------------------------------------------------------------------------------*/
    /*--------------------------------------------------Login---------------------------------------------------------*/

    /**
     * @Route("/Bibliography/login" , name="login")
     */
    public function loginAction(Request $request)
    {
        $nameIndexArray = [
            'name' => 'Login'
        ];
        $templateName = 'login';
        return $this->render($templateName . '.html.twig', $nameIndexArray);
    }

    /*----------------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------Student Controller----------------------------------------------------*/

    /**
     * @Route("/Bibliography/newReference" , name = "newRef_Form")
     */
    public function newFormAction(Request $request)
    {

//        $form = $this->createFormBuilder($bibliography)
//        ->add('name',TextType::class)
//        ->add('reference',TextType::class)
//        ->add('tag',TextType::class)
//        ->add('textSummary',TextType::class)
//        ->add('save',SubmitType::class, array('label'=> 'Create Reference'))
//        ->getForm();


        $bibliography = new Bibliography();
        $form = $this->createForm('AppBundle\Form\BibliographyType',$bibliography);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bibliography);
            $entityManager->flush();

//          $bibliography = $form->getData();
            return $this->redirectToRoute('showBibliography', array('id'=> $bibliography->getId()));
           // return $this->createAction($bibliography);
        }

        $argsArray = [
            'form'=> $form->createView(),
            'bibliography' => $bibliography,
        ];

        $templateName = 'createNewReference';
        return $this->render($templateName . '.html.twig', $argsArray);

    }

    /**
     * @Route("/Bibliography/processNewForm", name = "newRefProcessForm")
     */
    public function processNewFromAction(Request $request)
    {


        $name = $request->request->get('name');

        if (empty($name))
        {
            $this->addFlash(
                'error',
                'Reference cannot be empty'
            );
            return $this->newFormAction($request);
        }

            return $this->createAction($name);
    }








    /*----------------------------------------------------------------------------------------------------------------*/
    /*-------------------------Database ADD--------------------------*/

    /**
     * @param Bibliography $bibliography
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Bibliography $bibliography)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($bibliography);

        $entityManager->flush();

        return $this->redirectToRoute('showBibliography');
    }

    /*----------------------------------------------------------------------------------------------------------------*/

//        if ($name != null) {
//            $this->addFlash(
//                'notice',
//                'Your update went through '
//            );
//            $templateName = 'createNewReference';

            //return $this->render($templateName . '.html.twig', $argsArray);
            //return new Response('Created new Bibliography name entry' . $bib1->getId());


    /*----------------------------------------------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------------------------------------------*/
    /*---------------------Database DELETE--------------------------*/

    /**
     * @Route("/Bibliography/delete/{id}")
     */
    public function deleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $bibliographyRepository = $this->getDoctrine()->getRepository('AppBundle:Bibliography');

        $bibliography = $bibliographyRepository->find($id);

        $entityManager->remove($bibliography);

        $entityManager->flush();

        return new Response('Deleted with id ' . $id);

    }
    /*----------------------------------------------------------------------------------------------------------------*/
    /*-----------------------Database UPDATE--------------------------*/

    /**
     * @Route("/Bibliography/update/{id}/{newName}")
     */

    public function updateAction($id, $newName)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $bibliography = $entityManager->getRepository('AppBundle:Bibliography')->find($id);

        if (!$bibliography) {
            throw $this->createNotFoundException(
                'No bibliography for id' . $id
            );
        }

        $bibliography->setName($newName);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }

    /*----------------------------------------------------------------------------------------------------------------*/
    /*-----------------------Database READ-----------------------*/

    /**
     * @Route("/Bibliography/show/{id}" , name="showReference")
     */

    public function showAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $bibliography = $entityManager->getRepository('AppBundle:Bibliography')->find($id);

        if (!$bibliography) {
            throw $this->createNotFoundException(
                'No Bibliography found for id' . $id
            );
        }
        $argsArray = [
            'bibliography' => $bibliography
        ];
        $templateName = 'showReference';
        return $this->render($templateName . '.html.twig', $argsArray);
    }


    /*----------------------------------------------------------------------------------------------------------------*/
    /*------------------------DataBase LIST-----------------------------*/

    /**
     * @Route("/Bibliography/showBibliography" , name= "showBibliography")
     */
    public function listAction()
    {

        $bibliographyRepository = $this->getDoctrine()->getRepository('AppBundle:Bibliography');

        $bibRepo = $bibliographyRepository->findAll();

        $argsArray = [
            'bibliography' => $bibRepo
        ];

        $templateName = 'showBibliography';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /*----------------------------------------------------------------------------------------------------------------*/



























































    /*----------------------------------------------------------------------------------------------------------------*/

//                            /*------------------------DataBase LIST-----------------------------*/
//
//    /**
//     * @Route("/Bibliography/repository" , name= "showBibliography")
//     */
//    public function listAction()
//    {
//
//        $bibliographyRepository = $this->getDoctrine()->getRepository('AppBundle:Bibliography');
//
//        $bibRepo = $bibliographyRepository->findAll();
//
//        $argsArray = [
//            'bibliography' => $bibRepo
//        ];
//
//        $templateName = 'showBibliography';
//        return $this->render($templateName . '.html.twig', $argsArray);
//    }
//
//    /*----------------------------------------------------------------------------------------------------------------*/
//                            /*-------------------------Database ADD--------------------------*/
//
//    /**
//     * @Route("/Bibliography/create/{name}")
//     */
//    public function createAction($name)
//    {
//        $bib1 = new Bibliography();
//        $bib1->setName($name);
//        //$bib->setNumber('Test');
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->persist($bib1);
//        $entityManager->flush();
//
//        return new Response('Created new Bibliography name entry'.$bib1->getId());
//    }
//
//    /*----------------------------------------------------------------------------------------------------------------*/
//                              /*---------------------Database DELETE--------------------------*/
//
//    /**
//     * @Route("/Bibliography/delete/{id}")
//     */
//    public function deleteAction($id)
//    {
//        $entityManager = $this->getDoctrine()->getManager();
//        $bibliographyRepository = $this->getDoctrine()->getRepository('AppBundle:Bibliography');
//
//        $bibliography = $bibliographyRepository->find($id);
//
//        $entityManager->remove($bibliography);
//
//        $entityManager->flush();
//
//        return new Response('Deleted with id '.$id);
//
//    }
//    /*----------------------------------------------------------------------------------------------------------------*/
//                             /*-----------------------Database UPDATE--------------------------*/
//
//    /**
//     * @Route("/Bibliography/update/{id}/{newName}")
//     */
//
//    public function updateAction($id, $newName)
//    {
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $bibliography = $entityManager->getRepository('AppBundle:Bibliography')->find($id);
//
//        if(!$bibliography) {
//            throw $this->createNotFoundException(
//                'No bibliography for id' . $id
//            );
//        }
//
//        $bibliography->setName($newName);
//        $entityManager->flush();
//
//        return $this->redirectToRoute('homepage');
//    }
//
//    /*----------------------------------------------------------------------------------------------------------------*/
//                                 /*-----------------------Database READ-----------------------*/
//
//    /**
//     * @Route("/Bibliography/show/{id}" , name="showReference")
//     */
//
//    public function showAction($id)
//    {
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $bibliography = $entityManager->getRepository('AppBundle:Bibliography')->find($id);
//
//        if(!$bibliography)
//        {
//            throw $this->createNotFoundException(
//                'No Bibliography found for id'.$id
//            );
//        }
//        $argsArray = [
//            'bibliography' => $bibliography
//        ];
//        $templateName = 'showReference';
//        return $this->render($templateName.'.html.twig',$argsArray);
//    }
//
//    /*----------------------------------------------------------------------------------------------------------------*/
                            /*-----------------------Database add test-----------------------*/
//    /**
//     * @Route("/Bibliography/database_Add" , name="testDataAdd" )
//     */
//    public function databaseAction()//order of route...
//    {//adding to database
//
//        $bib = new Bibliography();
//        $bib->setName('Ross');
//        //$bib->setNumber('Test');
//
//        $entityManager = $this->getDoctrine()->getManager(); //get Entity manager
//        $entityManager->persist($bib); //tell to save
//        $entityManager->flush(); //commit to the addition
//
//        return new Response('Added Ross to database');
//    }

    /*----------------------------------------------------------------------------------------------------------------*/
//    /**
//     * @Route("/Bibliography/{wildcard}")
//     */
//    public function showAction($wildcard)
//    {
//        return $this->render('Bibliography/login.html.twig', [
//            'name'=>$wildcard
//        ]);
//    }

    /*----------------------------------------------------------------------------------------------------------------*/

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