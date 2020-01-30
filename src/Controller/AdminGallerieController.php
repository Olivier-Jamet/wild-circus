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
 * @Route("/admin/gallerie")
 */
class AdminGallerieController extends AbstractController
{
    /**
     * @Route("/", name="admin_gallerie_index", methods={"GET"})
     */
    public function index(GallerieRepository $gallerieRepository): Response
    {
        return $this->render('admin/gallerie/index.html.twig', [
            'galleries' => $gallerieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_gallerie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gallerie = new Gallerie();
        $form = $this->createForm(GallerieType::class, $gallerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gallerie);
            $entityManager->flush();

            return $this->redirectToRoute('admin_gallerie_index');
        }

        return $this->render('admin/gallerie/new.html.twig', [
            'gallerie' => $gallerie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_gallerie_show", methods={"GET"})
     */
    public function show(Gallerie $gallerie): Response
    {
        return $this->render('admin/gallerie/show.html.twig', [
            'gallerie' => $gallerie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_gallerie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gallerie $gallerie): Response
    {
        $form = $this->createForm(GallerieType::class, $gallerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_gallerie_index');
        }

        return $this->render('admin/gallerie/edit.html.twig', [
            'gallerie' => $gallerie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_gallerie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gallerie $gallerie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gallerie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gallerie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_gallerie_index');
    }
}
