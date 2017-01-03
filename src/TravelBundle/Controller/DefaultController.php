<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('TravelBundle:Default:index.html.twig');
    }

    /**
     * @Route("/travel")
     */
    public function travelAction()
    {
        return $this->render('TravelBundle:Default:travel.html.twig');
    }
}
