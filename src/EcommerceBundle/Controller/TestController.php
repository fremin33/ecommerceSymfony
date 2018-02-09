<?php
#src/EcommerceBundle/Controller/testController.php
namespace EcommerceBundle\Controller;

use EcommerceBundle\Entity\Produit;
use EcommerceBundle\Form\TestType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
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

    /**
     * @Route("/test", name="test")
     */
    public function testFormulaireAction(Request $request)
    {
        // On instancie un produit
        $produit = new Produit();
        // On crée le formulaire à partir de TestType et notre objet
        $form = $this->createForm(TestType::class, $produit);
        // Permet de manipuler les données après le post
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {
            var_dump($form->getData());
        }
        return $this->render('default/produits/test.html.twig', ['form' => $form->createView()]);
    }
}
