<?php

namespace PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PagesController extends Controller
{

    /**
     * @Route("/page/{id}", name="page")
     */
    public function showAction($id)
    {
        return $this->render('default/pages/show.html.twig', ['id' => $id]);
    }
}
