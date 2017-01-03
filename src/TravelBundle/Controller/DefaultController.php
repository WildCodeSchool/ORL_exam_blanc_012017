<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/travel")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('TravelBundle\Form\RechercheType');
        $form->handleRequest($request);
        $results = '';

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
           // $hotels = $em->getRepository('TravelBundle:Hotel')->findByHotelWithRoom($data['nbRoom'], $data['city'], $data['stars']);
          // dump($hotels);
            $hotels = $em->getRepository('TravelBundle:Hotel')->findByStarsAndCity($data['city'], $data['stars']);
            foreach($hotels as $hotel) {
                $rooms = $hotel->getRooms();
                $free=0;
                foreach ($rooms as $room) {
                    if ($room->getBook()==0) {
                        $free++;
                    }
                }
                if ($free>=$data['nbRoom']) {
                    $results[]=['hotel'=>$hotel, 'freeRoom'=>$free];
                }
            }
        }

        return $this->render('TravelBundle:Default:index.html.twig', array(
            'results' => $results,
            'form' => $form->createView(),
        ));

    }


}
