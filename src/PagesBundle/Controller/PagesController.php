<?php

namespace PagesBundle\Controller;

use PagesBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PagesController extends Controller
{

    /**
     *
     * @todo Affiche un lien des pages CGV et Mentions Légales
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository(Page::class)->findAll();
        return $this->render('default/pages/index.html.twig', [
            'pages' => $pages
        ]);
    }


    /**
     * @Route("/page/{id}", name="page")
     * @param Page $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @todo Affiche le contenu des pages CGV et Mentions Légales
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository(Page::class)->find($id);
        // Si la page n'existe pas on renvoi une exception
        if (!$page) throw $this->createNotFoundException("La page n'existe pas");
        return $this->render('default/pages/show.html.twig', ['page' => $page]);
    }
}
