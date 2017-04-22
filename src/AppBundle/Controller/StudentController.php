<?php
/**
 * Created by PhpStorm.
 * User: Ross
 * Date: 20-Apr-17
 * Time: 1:44 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\StudentRef2;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Route("/")
 *
 */
class StudentController extends Controller
{
    /**
     * @Route("/student/", name="secure_index")
     * @Security("has_role('ROLE_USER')")
     */
    public function studentAction()
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

        $templateName = '/student/index';
        return $this->render($templateName . '.html.twig', []);
    }

    /*--------------------------------------------------------------------------------*/

    /**
     * @Route("/student/repository", name="studentref2_index")
     * @Method("GET")
     * @Security("has_role('ROLE_USER')")
     */
    public function repositoryAction()
    {
        $em = $this->getDoctrine()->getManager();

        $studentRef2s = $em->getRepository('AppBundle:StudentRef2')->findAll();

        return $this->render('student/repository.html.twig', array(
            'studentRef2s' => $studentRef2s,
        ));
    }

    /*--------------------------------------------------------------------------------*/

    /**
     * Creates a new studentRef2 entity.
     * @Route("/student/new", name="studentref2_new")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction(Request $request)
    {
        $studentRef2 = new Studentref2();
        $form = $this->createForm('AppBundle\Form\StudentRef2Type', $studentRef2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($studentRef2);
            $em->flush();

            return $this->redirectToRoute('studentref2_show', array('id' => $studentRef2->getId()));
        }

        return $this->render('student/new.html.twig', array(
            'studentRef2' => $studentRef2,
            'form' => $form->createView(),
        ));
    }

    /*--------------------------------------------------------------------------------*/

    /**
     * Finds and displays a studentRef2 entity.
     * @Route("/student/{id}", name="studentref2_show")
     * @Method("GET")
     * @Security("has_role('ROLE_USER')")
     */
    public function showAction(StudentRef2 $studentRef2)
    {
        $deleteForm = $this->createDeleteForm($studentRef2);

        return $this->render('student/show.html.twig', array(
            'studentRef2' => $studentRef2,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*--------------------------------------------------------------------------------*/

    /**
     * Displays a form to edit an existing studentRef2 entity.
     * @Route("/student/{id}/edit", name="studentref2_edit")
     * @Method({"GET", "POST"})
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction(Request $request, StudentRef2 $studentRef2)
    {
        $deleteForm = $this->createDeleteForm($studentRef2);
        $editForm = $this->createForm('AppBundle\Form\StudentRef2Type', $studentRef2);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('studentref2_edit', array('id' => $studentRef2->getId()));
        }

        return $this->render('student/edit.html.twig', array(
            'studentRef2' => $studentRef2,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*--------------------------------------------------------------------------------*/

    /**
     * Deletes a studentRef2 entity.
     * @Route("/student/{id}", name="studentref2_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction(Request $request, StudentRef2 $studentRef2)
    {
        $form = $this->createDeleteForm($studentRef2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($studentRef2);
            $em->flush();
        }

        return $this->redirectToRoute('studentref2_index');
    }

    /*--------------------------------------------------------------------------------*/

    /**
     * Creates a form to delete a studentRef2 entity.
     * @param StudentRef2 $studentRef2 The studentRef2 entity
     * @return \Symfony\Component\Form\Form The form
     * @Security("has_role('ROLE_USER')")
     */
    private function createDeleteForm(StudentRef2 $studentRef2)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentref2_delete', array('id' => $studentRef2->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

}