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
        $hotels = '';

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $hotels = $em->getRepository('TravelBundle:Hotel')->findByHotelWithRoom($data['nbRoom'], $data['city'], $data['stars']);
        }

        return $this->render('TravelBundle:Default:index.html.twig', array(
            'hotels' => $hotels,
            'form' => $form->createView(),
        ));

    }


}
