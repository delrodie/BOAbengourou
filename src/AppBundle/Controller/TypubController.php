<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Typub;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typub controller.
 *
 * @Route("admin/typub")
 */
class TypubController extends Controller
{
    /**
     * Lists all typub entities.
     *
     * @Route("/", name="admin_typub_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typubs = $em->getRepository('AppBundle:Typub')->findAll();

        return $this->render('typub/index.html.twig', array(
            'typubs' => $typubs,
        ));
    }

    /**
     * Creates a new typub entity.
     *
     * @Route("/new", name="admin_typub_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typub = new Typub();
        $form = $this->createForm('AppBundle\Form\TypubType', $typub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typub);
            $em->flush();

            $this->addFlash('notice', 'Le type: '. $typub->getNom()." a été enregistré avec succès.!");

            return $this->redirectToRoute('admin_typub_index');
        }

        return $this->render('typub/new.html.twig', array(
            'typub' => $typub,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typub entity.
     *
     * @Route("/{slug}", name="admin_typub_show")
     * @Method("GET")
     */
    public function showAction(Typub $typub)
    {
        $deleteForm = $this->createDeleteForm($typub);

        return $this->render('typub/show.html.twig', array(
            'typub' => $typub,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typub entity.
     *
     * @Route("/{slug}/edit", name="admin_typub_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Typub $typub)
    {
        $deleteForm = $this->createDeleteForm($typub);
        $editForm = $this->createForm('AppBundle\Form\TypubType', $typub);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('notice', 'Le type: '. $typub->getNom()." a été modifié avec succès.!");

            return $this->redirectToRoute('admin_typub_index');
        }

        return $this->render('typub/edit.html.twig', array(
            'typub' => $typub,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typub entity.
     *
     * @Route("/{id}", name="admin_typub_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Typub $typub)
    {
        $form = $this->createDeleteForm($typub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typub);
            $em->flush();
        }

        return $this->redirectToRoute('admin_typub_index');
    }

    /**
     * Creates a form to delete a typub entity.
     *
     * @param Typub $typub The typub entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Typub $typub)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_typub_delete', array('id' => $typub->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
