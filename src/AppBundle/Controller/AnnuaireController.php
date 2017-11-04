<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Annuaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Annuaire controller.
 *
 * @Route("admin/annuaire")
 */
class AnnuaireController extends Controller
{
    /**
     * Lists all annuaire entities.
     *
     * @Route("/", name="admin_annuaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $annuaires = $em->getRepository('AppBundle:Annuaire')->findAll();

        return $this->render('annuaire/index.html.twig', array(
            'annuaires' => $annuaires,
        ));
    }

    /**
     * Creates a new annuaire entity.
     *
     * @Route("/new", name="admin_annuaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $annuaire = new Annuaire();
        $form = $this->createForm('AppBundle\Form\AnnuaireType', $annuaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($annuaire);
            $em->flush();

            return $this->redirectToRoute('admin_annuaire_index');
        }

        return $this->render('annuaire/new.html.twig', array(
            'annuaire' => $annuaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a annuaire entity.
     *
     * @Route("/{slug}", name="admin_annuaire_show")
     * @Method("GET")
     */
    public function showAction(Annuaire $annuaire)
    {
        $deleteForm = $this->createDeleteForm($annuaire);

        return $this->render('annuaire/show.html.twig', array(
            'annuaire' => $annuaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing annuaire entity.
     *
     * @Route("/{slug}/edit", name="admin_annuaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Annuaire $annuaire)
    {
        $deleteForm = $this->createDeleteForm($annuaire);
        $editForm = $this->createForm('AppBundle\Form\AnnuaireType', $annuaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_annuaire_index');
        }

        return $this->render('annuaire/edit.html.twig', array(
            'annuaire' => $annuaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a annuaire entity.
     *
     * @Route("/{id}", name="admin_annuaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Annuaire $annuaire)
    {
        $form = $this->createDeleteForm($annuaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($annuaire);
            $em->flush();
        }

        return $this->redirectToRoute('admin_annuaire_index');
    }

    /**
     * Creates a form to delete a annuaire entity.
     *
     * @param Annuaire $annuaire The annuaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Annuaire $annuaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_annuaire_delete', array('id' => $annuaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
