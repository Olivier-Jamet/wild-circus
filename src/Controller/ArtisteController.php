<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Form\ArtisteType;
use App\Repository\ArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/artiste")
 */
class ArtisteController extends AbstractController
{
    /**
     * @Route("/", name="artiste_index", methods={"GET"})
     */
    public function index(ArtisteRepository $artisteRepository): Response
    {
        return $this->render('user/artiste/index.html.twig', [
            'artistes' => $artisteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_artiste_show", methods={"GET"})
     */
    public function show(Artiste $artiste): Response
    {
        return $this->render('user/artiste/show.html.twig', [
            'artiste' => $artiste,
        ]);
    }
}
