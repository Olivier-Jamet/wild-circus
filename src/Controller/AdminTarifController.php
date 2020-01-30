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
 * @Route("/admin/tarif")
 */
class AdminTarifController extends AbstractController
{
    /**
     * @Route("/", name="admin_tarif_index", methods={"GET"})
     */
    public function index(TarifRepository $tarifRepository): Response
    {
        return $this->render('admin/tarif/index.html.twig', [
            'tarifs' => $tarifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_tarif_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tarif = new Tarif();
        $form = $this->createForm(Tarif1Type::class, $tarif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tarif);
            $entityManager->flush();

            return $this->redirectToRoute('admin_tarif_index');
        }

        return $this->render('admin/tarif/new.html.twig', [
            'tarif' => $tarif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_tarif_show", methods={"GET"})
     */
    public function show(Tarif $tarif): Response
    {
        return $this->render('admin/tarif/show.html.twig', [
            'tarif' => $tarif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_tarif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tarif $tarif): Response
    {
        $form = $this->createForm(Tarif1Type::class, $tarif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_tarif_index');
        }

        return $this->render('admin/tarif/edit.html.twig', [
            'tarif' => $tarif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_tarif_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Tarif $tarif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tarif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_tarif_index');
    }
}
