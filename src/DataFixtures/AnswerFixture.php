<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Persistence\ObjectManager;

class AnswerFixture extends BaseFixture
{
  protected function loadData(ObjectManager $manager)
  {

    $this->createMany(Answer::class, 10, function(Answer $article, $count) {
      $article->setContent($this->faker->articleTitle)
        ->setVote(rand(10,100));

      $article->setVoteCount($this->faker->numberBetween(5,100));
    });

    $manager->flush();
  }
}
