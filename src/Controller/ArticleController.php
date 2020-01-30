<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findBy([], ['date' => 'DESC']);
        return $this->render('user/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/{id}", name="user_article_show", methods={"GET"})
     * @param Article $article
     * @return Response
     */
    public function show(Article $article): Response
    {
        return $this->render('user/article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
