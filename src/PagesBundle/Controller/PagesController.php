<?php

namespace PagesBundle\Controller;

use PagesBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PagesController extends Controller
{

    // Affiche la liste des pages
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
