<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Typevent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typevent controller.
 *
 * @Route("admin/typevent")
 */
class TypeventController extends Controller
{
    /**
     * Lists all typevent entities.
     *
     * @Route("/", name="admin_typevent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typevents = $em->getRepository('AppBundle:Typevent')->findAll();

        return $this->render('typevent/index.html.twig', array(
            'typevents' => $typevents,
        ));
    }

    /**
     * Creates a new typevent entity.
     *
     * @Route("/new", name="admin_typevent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typevent = new Typevent();
        $form = $this->createForm('AppBundle\Form\TypeventType', $typevent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typevent);
            $em->flush();

            return $this->redirectToRoute('admin_typevent_index');
        }

        return $this->render('typevent/new.html.twig', array(
            'typevent' => $typevent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typevent entity.
     *
     * @Route("/{slug}", name="admin_typevent_show")
     * @Method("GET")
     */
    public function showAction(Typevent $typevent)
    {
        $deleteForm = $this->createDeleteForm($typevent);

        return $this->render('typevent/show.html.twig', array(
            'typevent' => $typevent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typevent entity.
     *
     * @Route("/{slug}/edit", name="admin_typevent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Typevent $typevent)
    {
        $deleteForm = $this->createDeleteForm($typevent);
        $editForm = $this->createForm('AppBundle\Form\TypeventType', $typevent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_typevent_index');
        }

        return $this->render('typevent/edit.html.twig', array(
            'typevent' => $typevent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typevent entity.
     *
     * @Route("/{id}", name="admin_typevent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Typevent $typevent)
    {
        $form = $this->createDeleteForm($typevent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typevent);
            $em->flush();
        }

        return $this->redirectToRoute('admin_typevent_index');
    }

    /**
     * Creates a form to delete a typevent entity.
     *
     * @param Typevent $typevent The typevent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Typevent $typevent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_typevent_delete', array('id' => $typevent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
