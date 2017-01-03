<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HotelController extends Controller
{
    /**
     * @Route("/hotel")
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('TravelBundle:Hotel')->findAll();
        return $this->render('TravelBundle:Default:index.html.twig', array(
            'hotels'=>$hotels
        ));
    }



}
