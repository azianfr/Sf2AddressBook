<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        if ($this->isGranted("IS_AUTHENTICATED_REMEMBERED"))
            return $this->redirect($this->generateUrl("fos_user_profile_show"));
        else
            return $this->redirect($this->generateUrl("fos_user_security_login"));
    }

}
