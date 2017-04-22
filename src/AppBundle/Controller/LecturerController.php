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
class StudentController extends Controller{


    public function studentAction()
    {

    }



}