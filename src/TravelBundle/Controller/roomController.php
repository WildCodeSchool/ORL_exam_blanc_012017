<?php

namespace TravelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TravelBundle\Entity\room;
use TravelBundle\Form\roomType;

/**
 * room controller.
 *
 * @Route("/room")
 */
class roomController extends Controller
{
    /**
     * Lists all room entities.
     *
     * @Route("/", name="room_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rooms = $em->getRepository('TravelBundle:room')->findAll();

        return $this->render('room/index.html.twig', array(
            'rooms' => $rooms,
        ));
    }

    /**
     * Creates a new room entity.
     *
     * @Route("/new", name="room_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $room = new room();
        $form = $this->createForm('TravelBundle\Form\roomType', $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($room);
            $em->flush();

            return $this->redirectToRoute('room_show', array('id' => $room->getId()));
        }

        return $this->render('room/new.html.twig', array(
            'room' => $room,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a room entity.
     *
     * @Route("/{id}", name="room_show")
     * @Method("GET")
     */
    public function showAction(room $room)
    {
        $deleteForm = $this->createDeleteForm($room);

        return $this->render('room/show.html.twig', array(
            'room' => $room,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing room entity.
     *
     * @Route("/{id}/edit", name="room_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, room $room)
    {
        $deleteForm = $this->createDeleteForm($room);
        $editForm = $this->createForm('TravelBundle\Form\roomType', $room);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($room);
            $em->flush();

            return $this->redirectToRoute('room_edit', array('id' => $room->getId()));
        }

        return $this->render('room/edit.html.twig', array(
            'room' => $room,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a room entity.
     *
     * @Route("/{id}", name="room_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, room $room)
    {
        $form = $this->createDeleteForm($room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($room);
            $em->flush();
        }

        return $this->redirectToRoute('room_index');
    }

    /**
     * Creates a form to delete a room entity.
     *
     * @param room $room The room entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(room $room)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('room_delete', array('id' => $room->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
