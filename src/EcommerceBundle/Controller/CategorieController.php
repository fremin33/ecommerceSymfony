<?php

namespace EcommerceBundle\Controller;
use EcommerceBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategorieController extends Controller
{

    // Affiche la liste des pages
    public function indexAction()
    {
        $em = $this->getdoctrine()->getManager();
        $categories = $em->getRepository(Categorie::class)->findAll();
        return $this->render('default/categories/index.html.twig', [
            'categories' => $categories
        ]);
    }


}