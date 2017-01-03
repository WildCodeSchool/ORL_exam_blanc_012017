<?php

namespace TravelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TravelBundle\Entity\Hotel;
use TravelBundle\Form\hotelType;
use TravelBundle\Form\roomType;
use TravelBundle\Entity\Room;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('TravelBundle:Room')->findAll();


        return $this->render('TravelBundle:Default:index.html.twig', array(
            'hotels' => $hotels,
        ));
    }
}
