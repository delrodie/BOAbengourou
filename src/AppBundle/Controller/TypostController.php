<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Typost;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typost controller.
 *
 * @Route("admin/typost")
 */
class TypostController extends Controller
{
    /**
     * Lists all typost entities.
     *
     * @Route("/", name="admin_typost_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typosts = $em->getRepository('AppBundle:Typost')->findAll();

        return $this->render('typost/index.html.twig', array(
            'typosts' => $typosts,
        ));
    }

    /**
     * Creates a new typost entity.
     *
     * @Route("/new", name="admin_typost_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typost = new Typost();
        $form = $this->createForm('AppBundle\Form\TypostType', $typost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typost);
            $em->flush();

            $this->addFlash('notice', 'Le type: '. $typost->getNom()." a été enregistré avec succès.!");

            return $this->redirectToRoute('admin_typost_index');
        }

        return $this->render('typost/new.html.twig', array(
            'typost' => $typost,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typost entity.
     *
     * @Route("/{slug}", name="admin_typost_show")
     * @Method("GET")
     */
    public function showAction(Typost $typost)
    {
        $deleteForm = $this->createDeleteForm($typost);

        return $this->render('typost/show.html.twig', array(
            'typost' => $typost,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typost entity.
     *
     * @Route("/{slug}/edit", name="admin_typost_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Typost $typost)
    {
        $deleteForm = $this->createDeleteForm($typost);
        $editForm = $this->createForm('AppBundle\Form\TypostType', $typost);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('notice', 'Le type: '. $typost->getNom()." a été modifié avec succès.!");

            return $this->redirectToRoute('admin_typost_index');
        }

        return $this->render('typost/edit.html.twig', array(
            'typost' => $typost,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typost entity.
     *
     * @Route("/{id}", name="admin_typost_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Typost $typost)
    {
        $form = $this->createDeleteForm($typost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typost);
            $em->flush();
        }

        return $this->redirectToRoute('admin_typost_index');
    }

    /**
     * Creates a form to delete a typost entity.
     *
     * @param Typost $typost The typost entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Typost $typost)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_typost_delete', array('id' => $typost->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
