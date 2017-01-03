<?php

namespace TravelBundle\Controller;

use TravelBundle\Entity\Hotel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('TravelBundle:Default:index.html.twig');
    }



    public function ChercherHotelAction(Hotel $capacity, $book)

    {
        $em = $this->getDoctrine()->getManager();
        $hotels = $em
            ->getRepository('TravelBundle:Hotel')
            ->getRepository('TravelBundle:Room')
            ->findby($capacity)
            ->findby($book);



        return $this->render('TravelBundle:Default:index.html.twig', array(
            'hotels' => $hotels,
        ));

    }
}
