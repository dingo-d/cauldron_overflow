<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionFixture extends BaseFixture implements DependentFixtureInterface
{

  public function getDependencies()
  {
    return [
      UserFixture::class,
    ];
  }

  protected function loadData(ObjectManager $manager)
  {

    $this->createMany(Question::class, 3, function (Question $question, $count) {
      $question->setTitle($this->faker->text(30))
        ->setQuestionContent(substr($this->faker->realText(), 0, 50))
        ->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 days'))
        ->setAuthor($this->getReference('App\Entity\User_' . $count));
    });

    $manager->flush();
  }
}
