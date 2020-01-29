<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtisteController extends AbstractController
{
    /**
     * @Route("/artiste", name="artiste_index")
     */
    public function index()
    {
        return $this->render('artiste/index.html.twig');
    }
}
