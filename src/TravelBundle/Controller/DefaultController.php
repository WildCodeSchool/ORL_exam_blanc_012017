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

    public function rechercheHotelAction(Request $request)
    {
        $form = $this->createForm('TravelBundle\Form\HotelType');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $nbChambres = $form->get('capacity')->getData();
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('TravelBundle:Room');
            $query = $repository->createQueryBuilder('ef')
                ->join('ef.hotel', 'f')
                ->where('f.capacity >= :nbChambres')
                ->setParameter(':nbChambres', $nbChambres)
                ->andWhere('ef.book LIKE :value')
                ->setParameter(':value', 0)
                ->getQuery();
            $hotels = $query->getResult();
            return $this->render('TravelBundle:Default:resultat.html.twig', array(
                'hotels'=> $hotels,
            ));
        }

        return $this->render('TravelBundle:Default:recherche.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
