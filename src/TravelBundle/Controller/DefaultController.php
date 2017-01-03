<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/travelle")
     */
    public function indexAction()
    {
        return $this->render('TravelBundle:Default:index.html.twig');
    }

    /**
     * @Route("/travel")
     */
    public function reservationShowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listRoom = $em->getRepository('TravelBundle:Room')->findAll();
        return $this->render('TravelBundle:Default:index.html.twig', array(
            'listRoom' => $listRoom
        ));
    }
}
