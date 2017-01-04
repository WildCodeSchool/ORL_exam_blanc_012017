<?php

namespace a\TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/accueil")
     */
    public function indexAction()
    {
        return $this->render('TravelBundle:Default:index.html.twig');
    }


    public function afficheAction()
    {
        $room = $this->getDoctrine()->getManager();
        $hotel = $hotel->getRepository("TravelBundle")->findAll();

        return $this->render("TravelBundle:Default:index.html.twig";
    }


}