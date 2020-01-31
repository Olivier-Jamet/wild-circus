<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/artiste")
 */
class ArtisteController extends AbstractController
{
    /**
     * @Route("/category/{category}", name="artiste_index", methods={"GET"})
     * @param ArtisteRepository $artisteRepository
     * @param string|null $category
     * @return Response
     */
    public function index(ArtisteRepository $artisteRepository, ?string $category=null): Response
    {
        if ($category === null) {
            $artistes = $artisteRepository->findAll();
        } else {
            $artistes = $artisteRepository->findBySpecialite($category);
        }
        return $this->render('user/artiste/index.html.twig', [
            'artistes' => $artistes,
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
