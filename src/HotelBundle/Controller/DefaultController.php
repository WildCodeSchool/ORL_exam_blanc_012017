<?php

namespace HotelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use HotelBundle\Entity\Requette;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="hotel")
     */
    public function indexAction(Request $request)
    {
        $requette = new Requette();
        $form = $this->createForm('HotelBundle\Form\RequetteType', $requette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qte= $form->getData()->getNb();
            for($i=1;$i<=$qte;$i++){
                $capa[]=$i;
            }
            $em = $this->getDoctrine()->getManager();
            $hotels = $em->getRepository('HotelBundle:Hotel')->findByCapacity($capa);
        //    var_dump($hotels[0]->getStars());
            return $this->render('HotelBundle:Default:index.html.twig', array(
                'requette' => $requette,
                'form' => $form->createView(),
                'hotels' => $hotels,
            ));
        }

        return $this->render('HotelBundle:Default:index.html.twig', array(
            'requette' => $requette,
            'form' => $form->createView(),
            'hotels' => $hotels=0,
        ));
    }

}
