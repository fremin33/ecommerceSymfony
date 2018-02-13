<?php

namespace EcommerceBundle\Controller;
use EcommerceBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategorieController extends Controller
{

    /**
     *
     * @todo Affiche la liste des categorie (appelé par la méthode render dans base.html.twig)
     *
     */
    public function indexAction()
    {
        $em = $this->getdoctrine()->getManager();
        $categories = $em->getRepository(Categorie::class)->findAll();
        return $this->render('default/categories/index.html.twig', [
            'categories' => $categories
        ]);
    }


}