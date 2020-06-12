<?php

namespace App\DataFixtures;

use App\Entity\Article;
use DateTime;
use Doctrine\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture
{
  protected function loadData(ObjectManager $manager)
  {

    $this->createMany(Article::class, 10, function(Article $article, $count) {
      $title = $this->faker->articleTitle;
      $slug = str_replace(' ', '-', strtolower( $title ));

      $article->setTitle($title)
        ->setSlug($slug)
        ->setContent($this->faker->realText());

      // publish most articles
      if ($this->faker->boolean(70)) {
        $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 days'));
      }

      $article->setAuthor($this->faker->name)
        ->setHeartCount($this->faker->numberBetween(5,100))
        ->setImageFilename('magic-photo.png');
    });

    $manager->flush();
  }
}
