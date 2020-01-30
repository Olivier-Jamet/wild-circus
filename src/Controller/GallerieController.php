<?php

namespace App\Controller;

use App\Entity\Gallerie;
use App\Form\GallerieType;
use App\Repository\GallerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gallerie")
 */
class GallerieController extends AbstractController
{
    /**
     * @Route("/", name="gallerie_index", methods={"GET"})
     */
    public function index(GallerieRepository $gallerieRepository): Response
    {
        return $this->render('user/gallerie/index.html.twig', [
            'galleries' => $gallerieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_gallerie_show", methods={"GET"})
     */
    public function show(Gallerie $gallerie): Response
    {
        return $this->render('user/gallerie/show.html.twig', [
            'gallerie' => $gallerie,
        ]);
    }
}
