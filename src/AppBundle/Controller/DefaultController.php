<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $infos = $em->getRepository('AppBundle:Information')->findAll();
        // Agenda
        $agendas = $em->getRepository('AppBundle:Agenda')->findEvent(0, 4);

        //dump($agendas);die();
        // Politique
        $politiques = $em->getRepository('AppBundle:Post')->findByType("politique", "dossier", 0, 4);
        // Culture
        $cultures = $em->getRepository('AppBundle:Post')->findByType("culture", "education", 0, 4);
        // Societe
        $societes = $em->getRepository('AppBundle:Post')->findByType("societe", "religion" , 0, 4);

        // Jeunes en action
        $jeunes = $em->getRepository('AppBundle:Post')->findByTag('cnj', 'jeune', 0, 12);
        // Publicite
        $pubs300x300 = $em->getRepository('AppBundle:Publicite')->findByTypub('Pub300x300', 0, 1);
        // Decouverte
        $decouvertes = $em->getRepository('AppBundle:Post')->findByType("decouverte", "decouverte" , 0, 4);
        // Sports
        $sports = $em->getRepository('AppBundle:Post')->findByType("sport", "sport" , 0, 4);
        $bynights = $em->getRepository('AppBundle:Post')->findByType("bynight", "bynight" , 0, 4);

        //dump($pubs300x300); die();

        return $this->render('default/index.html.twig', [
            'infos' => $infos,
            'politiques'  => $politiques,
            'cultures'  => $cultures,
            'societes'  => $societes,
            'agendas'  => $agendas,
            'jeunes'  => $jeunes,
            'decouvertes'  => $decouvertes,
            'sports'  => $sports,
            'bynights'  => $bynights,
            'pubs300x300'  => $pubs300x300,
        ]);
    }

    /**
     * @Route("/admin/tableau-de-bord", name="admin_index")
     */
    public function tbordAction(Request $request)
    {
        return $this->render('default/bo.html.twig');
    }

    /**
     * Date du jour encours
     *
     * @Route("/date", name="fo_date")
     */
    public function dateAction(Request $request)
    {
        $date = date('d M Y', time());

        return $this->render('default/date.html.twig', [ 'date' => $date]);
    }
}
