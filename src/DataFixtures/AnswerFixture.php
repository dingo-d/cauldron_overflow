<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnswerFixture extends BaseFixture implements DependentFixtureInterface
{

  public function getDependencies()
  {
    return [
      UserFixture::class,
      QuestionFixture::class,
    ];
  }

  protected function loadData(ObjectManager $manager)
  {
    $questions = [
      $this->getReference('App\Entity\Question_0'),
      $this->getReference('App\Entity\Question_1'),
      $this->getReference('App\Entity\Question_2'),
    ];

    $this->createMany(Answer::class, 10, function (Answer $answer, $count) use ($questions) {
      $answer->setContent($this->faker->text(20))
        ->setVote(rand(10, 100))
        ->setAuthor($this->getReference('App\Entity\User_' . $count))
        ->setVoteCount($this->faker->numberBetween(5, 100))
        ->setQuestion($this->faker->randomElement($questions));
    });

    $manager->flush();
  }
}
