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
     * @Route("/produit", name="produit")
     */
    public function showAction()
    {
        return $this->render('default/produits/show.html.twig', []);
    }

    /**
     * @Route("/add")
     */
    public function addAction()
    {
        /* On récupère L'entity Manager*/
//        $em = $this->getDoctrine()->getManager();
//        $produit = new Produit();
//        $produit->setNom('Produit 1');
//        $produit->setDescription('Blablavla');
//        $produit->setCategorie("game");
//        $produit->setDisponible(true);
//        $produit->setPrix(5.55);
//        $produit->setImage("jolie");
//        $produit->setTva(5.55);
//        $em->persist($produit);


        return $this->render('default/pages/show.html.twig');
    }
}
