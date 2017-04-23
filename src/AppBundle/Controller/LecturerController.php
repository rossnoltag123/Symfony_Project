<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Lecturer;
use AppBundle\Entity\LecturerBibliography;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Bibliography;
use AppBundle\Entity\ProposedTag;
use Doctrine\ORM\Query;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * User controller.
 *
 * @Route("/Lecturer")
 */
class LecturerController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Route("/", name="lecture_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lecturer = $em->getRepository('AppBundle:Bibliography')->findAll();

        return $this->render('Lecturer/index.html.twig', array(
            'lecturer' => $lecturer,
        ));
    }

    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="lecturer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lecturer = new LecturerBibliography();
        $form = $this->createForm('AppBundle\Form\LectureType', $lecturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lecturer);
            $em->flush();

            return $this->redirectToRoute('lecturer_show', array('id' => $lecturer->getId()));
        }

        return $this->render('Lecturer/new.html.twig', array(
            'lecturer' => $lecturer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     * @Route("/{id}", name="lecturer_show")
     * @Method("GET")
     */
    public function showAction(Lecturer $lecturer)
    {
        $deleteForm = $this->createDeleteForm($lecturer);

        return $this->render('Lecture/show.html.twig', array(
            'lecturer' => $lecturer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{id}/edit", name="lecturer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lecturer $lecturer)
    {
        $deleteForm = $this->createDeleteForm($lecturer);
        $editForm = $this->createForm('AppBundle\Form\LectureType', $lecturer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lecture_edit', array('id' => $lecturer->getId()));
        }

        return $this->render('Lecturer/edit.html.twig', array(
            'lecturer' => $lecturer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="lecturer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lecturer $lecturer)
    {
        $form = $this->createDeleteForm($lecturer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lecturer);
            $em->flush();
        }

        return $this->redirectToRoute('lecture_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $lecture The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lecturer $lecturer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lecturer_delete', array('id' => $lecturer->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }



    /*------------------------Tag Action-----------------------------*/

    /**
     * @Route("/Bibliography/taglist" , name= "taglist")
     */
    public function tagAction()
    {
        $bibliographyRepository = $this->getDoctrine()->getRepository('AppBundle:Bibliography');

        $bibRepo = $bibliographyRepository->findAll();
        $tagIDs= new ArrayCollection( $bibRepo);

        $tagIDs->add('Hello');
        dump($tagIDs);


        $argsArray = [
            'bibliography' => $bibRepo
        ];

        $templateName = 'tags';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /*----------------------------------------------------------------------------------------------------------------*/
    /*-------------------------ProposedTag Add--------------------------*/

    /**
     * @Route("/Bibliography/proposedTags/{id}" , name="proposedTags")
     */
    public function proposedTagAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $tagID = $entityManager->getRepository('AppBundle:Bibliography')->find($id);

//        $tagIDs= new ArrayCollection($tagID);
//
//        $tagIDs->add('Hello');
//
//        dump($tagIDs);

        if (!$tagID) {
            throw $this->createNotFoundException(
                'No Bibliography found for id' . $id
            );
        }

        $argsArray = [
            'tagID' =>  $tagID
        ];

        $templateName = 'proposedTags';
        return $this->render($templateName . '.html.twig', $argsArray);
//        $argsArray,array('tagIDs'=>$tagIDs)

        return $this->createAction($tagID);
    }

    /*----------------------------------------------------------------------------------------------------------------*/
    /*-----------------------Proposed New Tag--------------------------*/

    /**
     * @Route("/Bibliography/newtaglist/frontend" , name= "newtaglist")
     */
    public function newtagFrontEndAction()
    {
        $frontend = $this->getDoctrine()->getRepository('AppBundle:Front');

        $maths = $this->getDoctrine()->getRepository('AppBundle:Maths');

        $frontRepo =  $frontend->findAll();

        $math=  $maths->findAll();

        $argsArray = [
            'frontRepo' => $frontRepo,
            'maths'=> $math,
        ];

        $templateName = 'proposedNewTags';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @Route("/Bibliography/newtaglist/create/{id}")
     */
    public function createNewTagAction($name)
    {
        $front = new Front();
        $front->setTag($name);

        // entity manager
        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($front);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        $argsArray = [
        ];
        $templateName = 'proposedNewTags';
        return $this->render($templateName . '.html.twig', $argsArray);
    }


}
