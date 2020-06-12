<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use DateTime;
use Doctrine\Persistence\ObjectManager;

class AnswerFixture extends BaseFixture
{
  protected function loadData(ObjectManager $manager)
  {

    $this->createMany(Answer::class, 10, function(Answer $article, $count) {
      $article->setContent('Make sure your cat is sitting `purrrfectly` still 🤣')
        ->setVote(rand(10,100));

      // publish most articles
      if (rand(1, 10) > 2) {
        $article->setPublishedAt(new DateTime(sprintf('-%d days', rand(1, 100))));
      }

      $article->setAuthor('Author McAuthory')
        ->setHeartCount(rand(5, 100))
        ->setImageFilename('magic-photo.png');
    });

    $manager->flush();
  }
}
