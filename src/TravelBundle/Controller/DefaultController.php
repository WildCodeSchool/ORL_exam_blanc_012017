<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;
use TravelBundle\Entity\Room;

class DefaultController extends Controller
{
    /**
     * @Route("/travel")
     */
    public function indexAction()
    {
        return $this->render('TravelBundle:Default:index.html.twig');
    }

    /**
     * @Route("/hotel/{id}", name="hotel_available)
     */
    public function availableAction(Room $room, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $hotel_available = $em->getRepository('TravelBundle:Room')->findByCapacity();

        return $this->render('TravelBundle:Default:hotel.html.twig', array(
            'hotel_available' => $hotel_available,
        ));

    }
}
