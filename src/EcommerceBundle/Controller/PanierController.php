<?php
#src/EcommerceBundle/Controller/AdministrationController.php
namespace EcommerceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{

    /**
     * @Route("/panier", name="panier")
     */
    public function indexAction()
    {
        return $this->render('default/panier/panier.html.twig');
    }

    /**
     * @Route("/panier/livraison", name="livraison")
     */
    public function livraisonAction()
    {
       return $this->render('default/panier/livraison.html.twig');
    }

    /**
     * @Route("/panier/validation", name="validation")
     */
    public function validationAction()
    {
        return $this->render('default/panier/validation.html.twig');
    }
}