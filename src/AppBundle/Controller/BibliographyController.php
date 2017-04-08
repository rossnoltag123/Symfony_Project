<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bibliography;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

//@Route("/Bibliography")
/**
 * Class BibliographyController
 * @package AppBundle\Controller
 *
 */
class BibliographyController extends Controller
{
    /**
     * @Route("/Bibliography/new")
     */
    public function newAction()//order of route...
    {//adding to database
        $bib = new Bibliography();
        $bib->setName('Ross');
        $bib->setDif('Test');

        $entityManager = $this->getDoctrine()->getManager();//get manager
        $entityManager->persist($bib);//tell to save
        $entityManager->flush();// commit to the addition


        return new Response('<html><body>Added Ross to database</body></html>');
    }



    /**
     * @Route("/Bibliography/{wildcard}")
     */
    public function showAction($wildcard)
    {
        $notes = [
          'New entry: Latest technology in 3d accelerated hardware',
            'Old entry: A study on the latest in game graphics',
            'Admin entry: Update database'
        ];

        return $this->render('Bibliography/show.html.twig', [
            'name'=>$wildcard,
            'notes'=> $notes
        ]);
    }
}