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
            return $this->redirect($this->generateUrl("contact"));
        else
            return $this->redirect($this->generateUrl("fos_user_security_login"));
    }

    /**
     * @Route("/contact/all", name="contact_all")
     * @Template()
     */
    public function allAction() {
        $em = $this->getDoctrine()->getManager();
        return (array("users" => $em->getRepository("AppBundle:User")->findAll()));
    }

    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function myContactsAction() {
        $security = $this->container->get('security.context');
        $user = $security->getToken()->getUser();

        return array("user" => $user);
    }

    /**
     * @Route("/contact/show/{id}", name="contact_show")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository("AppBundle:User")->find($id);

        return array("user" => $contact);
    }

    /**
     * @Route("/contact/add/{id}", name="contact_add")
     */
    public function addAction($id) {
        $security = $this->container->get('security.context');
        $user = $security->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository("AppBundle:User")->find($id);

        $user->addContacts($contact);
        $contact->addContactsWithMe($user);
        $em->persist($user);
        $em->persist($contact);
        $em->flush();

        return $this->redirect($this->generateUrl("contact"));
    }

    /**
     * @Route("/contact/remove/{id}", name="contact_remove")
     */
    public function removeAction($id) {
        $security = $this->container->get('security.context');
        $user = $security->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository("AppBundle:User")->find($id);

        $user->removeContacts($contact);
        $contact->removeContactsWithMe($user);

        $em->persist($user);
        $em->persist($contact);
        $em->flush();

        return $this->redirect($this->generateUrl("contact"));
    }

}
