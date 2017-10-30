<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FrontofficeController extends Controller
{
    /**
     * @Route("/menu-actualite-{type1}-{type2}", name="fo_menu")
     */
    public function menuactualiteAction(Request $request, $type1, $type2)
    {
        $em = $this->getDoctrine()->getManager();

        $menus = $em->getRepository('AppBundle:Post')->findByType($type1, $type2, 0, 4);

        return $this->render('frontoffice/menuActualite.html.twig', [
            'menus'  => $menus,
        ]);
    }

    /**
     * @Route("/menu-actualite-agenda", name="fo_menu_agenda")
     */
    public function menuagendaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $menus = $em->getRepository('AppBundle:Agenda')->findEvent(0, 4);

        return $this->render('frontoffice/menuAgenda.html.twig', [
            'menus'  => $menus,
        ]);
    }

    /**
     * Calcul du nombre du nombre d'articles par rubriques
     *
     * @Route("/nombre-article-{rubrique}", name="fo_nb_articles")
     */
    public function nbarticleAction(Request $request, $rubrique)
    {
        $em = $this->getDoctrine()->getManager();

        $nbArticle = $em->getRepository('AppBundle:Post')->findNbArticleByTypost($rubrique);

        return $this->render('frontoffice/nbArticle.html.twig', array(
            'nbArticle'  => $nbArticle,
        ));
    }

    /**
     * Affichange de la page de l'article
     *
     * @Route("/actualite/{type}/{slug}", name="fo_actualite_type")
     */
    public function articleAction(Request $request, $type, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Post')->findBySlug($slug);
        $similaires = $em->getRepository('AppBundle:Post')->findSimilaire($type, $slug);

        return $this->render('frontoffice/post.html.twig', array(
            'similaires'  => $similaires,
            'post'  => $post,
        ));
    }

    /**
     * Affichage de la rubrique globale
     *
     * @Route("/categorie/{nom}/", name="fo_rubrique_post")
     */
    public function rubriquePostAction(Request $request, $nom)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findByType($nom, $nom, 0, 8);

        return $this->render('frontoffice/rubrique.html.twig', array(
            'posts' => $posts,
            'rubrique'  => $nom,
        ));

    }

    /**
     * Affichage des posts correspondants aux tags
     *
     * @Route("/{tag}/articles-correspondants", name="fo_tag_post")
     */
    public function tagPostAction(Request $request, $tag)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findByTag($tag, $tag, 0, 8);
        //dump($posts);die();
        return $this->render('frontoffice/rubrique.html.twig', array(
            'posts' => $posts,
            'rubrique'  => $tag,
        ));
    }
}
