<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture implements DependentFixtureInterface
{

  public function getDependencies()
  {
    return [
      UserFixture::class,
    ];
  }

  protected function loadData(ObjectManager $manager)
  {
    $this->createMany(Article::class, 10, function (Article $article, $count) {
      $article->setTitle($this->faker->text(20))
        ->setContent($this->faker->realText());

      // publish most articles
      if ($this->faker->boolean(70)) {
        $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 days'));
      }

      $author = $this->getReference('App\Entity\User_' . $count);

      $article->setAuthor($author->getName())
        ->setHeartCount($this->faker->numberBetween(5, 100))
        ->setImageFilename('magic-photo.png');
    });

    $manager->flush();
  }
}
