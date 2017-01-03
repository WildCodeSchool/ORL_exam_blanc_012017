<?php

namespace TravelBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TravelBundle\Entity\Room;

/**
 * Room controller.
 *
 * @Route("/room")
 */
class RoomController extends Controller
{
    /**
     * Lists all Room entities.
     *
     * @Route("/", name="room_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rooms = $em->getRepository('TravelBundle:Room')->findAll();

        return $this->render('room/index.html.twig', array(
            'rooms' => $rooms,
        ));
    }

    /**
     * Finds and displays a Room entity.
     *
     * @Route("/{id}", name="room_show")
     * @Method("GET")
     */
    public function showAction(Room $room)
    {

        return $this->render('room/show.html.twig', array(
            'room' => $room,
        ));
    }
}
