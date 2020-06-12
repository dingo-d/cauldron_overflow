<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
  /**
   * @var ArticleRepository|ObjectRepository
   */
  private $repository;

  public function __construct(EntityManagerInterface $em)
  {
    $this->repository = $em->getRepository(Article::class);
  }

  /**
   * @Route("/news", name="news")
   */
  public function index()
  {
    $articles = $this->repository->findAll();

    return $this->render('news/index.html.twig', [
      'controller_name' => 'NewsController',
      'articles'        => $articles,
    ]);
  }

  /**
   * @Route("/news/{slug}", name="news_article_show")
   */
  public function show($slug)
  {
    /** @var Article $article */
    $article = $this->repository->findOneBy(['slug' => $slug]);

    if (!$article) {
      throw $this->createNotFoundException(sprintf('No article for slug: %s', $slug));
    }

    return $this->render('news/show.html.twig', [
      'article' => $article,
    ]);
  }
}
