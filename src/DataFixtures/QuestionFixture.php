<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Persistence\ObjectManager;

class QuestionFixture extends BaseFixture
{
  protected function loadData(ObjectManager $manager)
  {

    $this->createMany(Question::class, 2, function(Question $article, $count) {
      $article->setContent($this->faker->articleTitle)
        ->setVote(rand(10,100));

      $article->setVoteCount($this->faker->numberBetween(5,100));
    });

    $manager->flush();
  }
}
