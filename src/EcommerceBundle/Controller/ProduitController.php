<?php
#src/EcommerceBundle/Controller/ProduitController.php
namespace EcommerceBundle\Controller;

use EcommerceBundle\Entity\Categorie;
use EcommerceBundle\Entity\Produit;
use EcommerceBundle\Form\RechercheType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    /**
     *
     * @Route("/", name="produits")
     * @todo Affiche la liste des produits
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository(Produit::class)->findAll();
        return $this->render('default/produits/index.html.twig', [
            'produits' => $produits
        ]);
    }

    /**
     *
     * @Route("/produit/{produit}", name="produit")
     * @param Produit $produit
     * @return \Symfony\Component\HttpFoundation\Response
     * @todo Affiche les informations propre à un produit
     *
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
     *
     * @Route("/categorie/{categorie}", name="categorieProduits")
     * @param Categorie $categorie
     * @return \Symfony\Component\HttpFoundation\Response
     * @todo Affiche la liste des produits propre à une categorie
     *
     */
    public function categorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository(Produit::class)->byCategorie($categorie);
        return $this->render('default/produits/index.html.twig', [
            'produits' => $produits
        ]);
    }

    /**
     * @Route("/recherche", name="recherche")
     * @param $query
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function rechercheTraitementAction()
    {

        $defaultData = array('message' => "A utiliser quand le formulaire n'utilise pas de class");
        $form = $this->createForm(RechercheType::class, $defaultData);
        if ($this->get(Request::METHOD_POST)) {
            $form->get('request');
            echo $form['recherche']->getData();
        }
        die();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository(Produit::class)->recherche();
        return $this->render('default/produits/index.html.twig', [
            'produit' => $produit
        ]);
    }


    public function rechercheAction()
    {
        $defaultData = array('message' => "A utiliser quand le formulaire n'utilise pas de class");
        $form = $this->createForm(RechercheType::class, $defaultData);
        return $this->render('form/recherche.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('default/pages/show.html.twig');
    }
}
