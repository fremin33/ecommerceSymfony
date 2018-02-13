<?php
#src/EcommerceBundle/Controller/ProduitController.php
namespace EcommerceBundle\Controller;

use EcommerceBundle\Entity\Produit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{


    /**
     * @Route("/", name="produits")
     */
    public function indexAction()
    {
        // On récupère l'Entity Manager
        $em = $this->getDoctrine()->getManager();
        // On récupère le Repository Produit et on applique la méthode findAll
        $produits = $em->getRepository(Produit::class)->findAll();
        return $this->render('default/produits/index.html.twig', [
            'produits' => $produits
        ]);
    }


    /**
     * @Route("/produit/{produit}", name="produit")
     */
    public function showAction($produit)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository(Produit::class)->find($produit);
        return $this->render('default/produits/show.html.twig', [
            'produit' => $produit
        ]);
    }

    /**
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('default/pages/show.html.twig');
    }

    /**
     * @Route("/categorie/{categorie}", name="categorieProduits")
     */
    public function categorieAction($categorie)
    {

        // Récupérer les produits propres à une category
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository(Produit::class)->byCategorie($categorie);
        return $this->render('default/produits/index.html.twig', [
            'produits' => $produits
        ]);
    }

}
