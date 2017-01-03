<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TravelBundle\Form\HotelType;

class DefaultController extends Controller
{
    /**
     * @Route("/travel")
     */
    public function indexAction()
    {
        return $this->render('TravelBundle:Default:index.html.twig');

    }
    public function searchAction()
    {

        $form = $this->createForm(new HotelType());

        $request = $this->getRequest();

        return $this->render('TravelBundle::search.html.twig', array('form' => $form->createView()));
    }
}
