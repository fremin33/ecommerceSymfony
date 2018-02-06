<?php
#src/EcommerceBundle/Controller/DefaultController.php
namespace EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('ecommerce/index.html.twig', []);
    }

    /**
     * @Route("/firstPage/{id}", name="first", requirements={"id"="\d+"})
     */
    public function firstTestAction($id)
    {
        return $this->render('ecommerce/firstPage.html.twig', ['id' => $id]);
    }
}
