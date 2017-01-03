<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;
use TravelBundle\Form\RoomSearchType;

class DefaultController extends Controller
{
    /**
     * @Route("/travel")
     */
    public function indexAction(Capacity $capacity)
    {
        $repository = $this->getDoctrine()->getRepository('TravelBundle:Hotel');
        $query = $repository->createQueryBuilder('e')
          ->where('e.capacity >= :capacity')
               ->setParameter('capacity', $capacity)
           ->getQuery();

        $capacity = $query->getResult();


        $form = $this->createForm(new RoomSearchType());
        $request = $this->getRequest();
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $data = $this->getRequest()->request->get();
                $liste_chambre = $em->getRepository('TravelBundle:Room')->findRoomByparameter($data);
                return $this->render('list.html.twig', array('liste_annonces' => $liste_chambre));
            }
        }

        return $this->render(':recherche:form.html.twig', array(
            'capacité' => $capacity,
            'form' => $form->createView(),
        ));
        
        

        
    }
}
