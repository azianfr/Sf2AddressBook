<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends BaseController {

    /**
     * @Route("/register/{type}", defaults={"type" = "member"}, name="my_register")
     */
    public function registerAction() {
        $response = parent::registerAction();
        
        return $response;
    }

}
