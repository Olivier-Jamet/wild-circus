<?php

namespace App\Controller;

use App\Entity\Tarif;
use App\Form\Tarif1Type;
use App\Repository\TarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tarif")
 */
class TarifController extends AbstractController
{
    /**
     * @Route("/", name="tarif_index", methods={"GET"})
     */
    public function index(TarifRepository $tarifRepository): Response
    {
        return $this->render('user/tarif/index.html.twig', [
            'tarifs' => $tarifRepository->findAll(),
        ]);
    }
}
