<?php

namespace TravelBundle\Controller;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use TravelBundle\Entity\Room;
use TravelBundle\Entity\Hotel;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class DefaultController extends Controller
{
//    /**
//     * @Route("/")
//     */
//    public function indexAction()
//    {
//        return $this->render('TravelBundle:Default:index.html.twig');
//    }

    /**
     * @Route("/find", name="find_room")
     */
    public function findRoomAction(Request $request)
    {
        $room = new Room;

        $form = $this->createFormBuilder()
//            ->add('city', CollectionType::class,array(
//                'entry_type' => EntityType::class,
//                'entry_options' => array(
//                    'class'=>'TravelBundle:Hotel',
//                    'choice_label' => 'city',
//                    'expanded' => false,
//                    'multiple'=> false,
//                    'required'=>false,
//                    )
//            ))
            ->add('nbRoom', NumberType::class,array(
                'label'=>'Nombre de chambres',
                'required'=>true,
            ))
            ->add('save', SubmitType::class, array('label' => 'Réserver'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $nbRoom = $form->getData();

            $em = $this->getDoctrine()->getManager();

//            $rooms = $em->getRepository('Hotel.php')->findBy(array('book'=>false),array('capacity'=>$nbRoom));
//            $rooms = $em->getRepository('Hotel.php')->findBy(array('book'=>false));
            $rooms = $em->getRepository('TravelBundle:Hotel.php')->findAll();

            return $this->render('TravelBundle::listRooms.html.twig',array('rooms'=>$rooms));
        }

        return $this->render('TravelBundle::Default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
