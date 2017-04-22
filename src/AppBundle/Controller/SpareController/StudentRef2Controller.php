<?php

namespace AppBundle\Controller\SpareController;

use AppBundle\Entity\StudentRef2;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

///**
// * Studentref2 controller.
// * @Route("studentref2")
// */
class StudentRef2Controller extends Controller
{}
//    /**
//     * Lists all studentRef2 entities.
//     *
//     * @Route("/", name="studentref2_index")
//     * @Method("GET")
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $studentRef2s = $em->getRepository('AppBundle:StudentRef2')->findAll();
//
//        return $this->render('studentref2/index.html.twig', array(
//            'studentRef2s' => $studentRef2s,
//        ));
//    }

//    /**
//     * Creates a new studentRef2 entity.
//     *
//     * @Route("/new", name="studentref2_new")
//     * @Method({"GET", "POST"})
//     */
//    public function newAction(Request $request)
//    {
//        $studentRef2 = new Studentref2();
//        $form = $this->createForm('AppBundle\Form\StudentRef2Type', $studentRef2);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($studentRef2);
//            $em->flush();
//
//            return $this->redirectToRoute('studentref2_show', array('id' => $studentRef2->getId()));
//        }
//
//        return $this->render('studentref2/new.html.twig', array(
//            'studentRef2' => $studentRef2,
//            'form' => $form->createView(),
//        ));
//    }
//
//    /**
//     * Finds and displays a studentRef2 entity.
//     *
//     * @Route("/{id}", name="studentref2_show")
//     * @Method("GET")
//     */
//    public function showAction(StudentRef2 $studentRef2)
//    {
//        $deleteForm = $this->createDeleteForm($studentRef2);
//
//        return $this->render('studentref2/show.html.twig', array(
//            'studentRef2' => $studentRef2,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }

//    /**
//     * Displays a form to edit an existing studentRef2 entity.
//     *
//     * @Route("/{id}/edit", name="studentref2_edit")
//     * @Method({"GET", "POST"})
//     */
//    public function editAction(Request $request, StudentRef2 $studentRef2)
//    {
//        $deleteForm = $this->createDeleteForm($studentRef2);
//        $editForm = $this->createForm('AppBundle\Form\StudentRef2Type', $studentRef2);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('studentref2_edit', array('id' => $studentRef2->getId()));
//        }
//
//        return $this->render('studentref2/edit.html.twig', array(
//            'studentRef2' => $studentRef2,
//            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Deletes a studentRef2 entity.
//     *
//     * @Route("/{id}", name="studentref2_delete")
//     * @Method("DELETE")
//     */
//    public function deleteAction(Request $request, StudentRef2 $studentRef2)
//    {
//        $form = $this->createDeleteForm($studentRef2);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($studentRef2);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('studentref2_index');
//    }

//    /**
//     * Creates a form to delete a studentRef2 entity.
//     *
//     * @param StudentRef2 $studentRef2 The studentRef2 entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(StudentRef2 $studentRef2)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('studentref2_delete', array('id' => $studentRef2->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }

