<?php

namespace HotelBundle\Controller;

use HotelBundle\Entity\Requette;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Requette controller.
 *
 * @Route("requette")
 */
class RequetteController extends Controller
{
    /**
     * Lists all requette entities.
     *
     * @Route("/", name="requette_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $requettes = $em->getRepository('HotelBundle:Requette')->findAll();

        return $this->render('requette/index.html.twig', array(
            'requettes' => $requettes,
        ));
    }

    /**
     * Creates a new requette entity.
     *
     * @Route("/new", name="requette_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $requette = new Requette();
        $form = $this->createForm('HotelBundle\Form\RequetteType', $requette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($requette);
            $em->flush($requette);

            return $this->redirectToRoute('requette_show', array('id' => $requette->getId()));
        }

        return $this->render('requette/new.html.twig', array(
            'requette' => $requette,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a requette entity.
     *
     * @Route("/{id}", name="requette_show")
     * @Method("GET")
     */
    public function showAction(Requette $requette)
    {
        $deleteForm = $this->createDeleteForm($requette);

        return $this->render('requette/show.html.twig', array(
            'requette' => $requette,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing requette entity.
     *
     * @Route("/{id}/edit", name="requette_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Requette $requette)
    {
        $deleteForm = $this->createDeleteForm($requette);
        $editForm = $this->createForm('HotelBundle\Form\RequetteType', $requette);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('requette_edit', array('id' => $requette->getId()));
        }
        return $this->render('requette/edit.html.twig', array(
            'requette' => $requette,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a requette entity.
     *
     * @Route("/{id}", name="requette_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Requette $requette)
    {
        $form = $this->createDeleteForm($requette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($requette);
            $em->flush($requette);
        }

        return $this->redirectToRoute('requette_index');
    }

    /**
     * Creates a form to delete a requette entity.
     *
     * @param Requette $requette The requette entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Requette $requette)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('requette_delete', array('id' => $requette->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
