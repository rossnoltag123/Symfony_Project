<?php
/**
 * Created by PhpStorm.
 * User: Ross
 * Date: 20-Apr-17
 * Time: 8:48 PM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

///**
// * Class SecurityControllerSymf
// * @package AppBundle\Controller
// * @Route("/symfonySecurity")
// */
class SecurityControllerSymf extends Controller
{
    /**
     * @Route("/loginSymf" , name="loginSymf")
     */
    public function loginAction(Request $request)
    {
        $authenticateUtils = $this->get('security.authentication_utils');

        $error = $authenticateUtils->getLastAuthenticationError();

        $lastUsername = $authenticateUtils->getLastUsername();

        $templateName = 'loginSymf';
        $argsArray = [
            'last_username' => $lastUsername,
            'error'         => $error,
        ];

        return $this->render($templateName . '.html.twig', $argsArray);
    }
}
