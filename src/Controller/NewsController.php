<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
  /**
   * @Route("/news", name="news")
   */
  public function index(ArticleRepository $repository)
  {
    $articles = $repository->findAllPublishedOrderedByNewest();

    return $this->render('news/index.html.twig', [
      'controller_name' => 'NewsController',
      'articles'        => $articles,
    ]);
  }

  /**
   * @Route("/news/{slug}", name="news_article_show")
   */
  public function show(Article $article)
  {
    return $this->render('news/show.html.twig', [
      'article' => $article,
    ]);
  }
}
