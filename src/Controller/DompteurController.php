<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dompteur")
 */
class DompteurController extends AbstractController
{
    /**
     * @Route("/", name="dompteur_index", methods={"GET"})
     * @param ArtisteRepository $artisteRepository
     * @return Response
     */
    public function index(ArtisteRepository $artisteRepository): Response
    {
        return $this->render('user/artiste/index.html.twig', [
            'artistes' => $artisteRepository->findBy(
                ['specialite' => 'dompteur']),
        ]);
    }

    /**
     * @Route("/{id}", name="user_artiste_show", methods={"GET"})
     * @param Artiste $artiste
     * @return Response
     */
    public function show(Artiste $artiste): Response
    {
        return $this->render('user/artiste/show.html.twig', [
            'artiste' => $artiste,
        ]);
    }
}
