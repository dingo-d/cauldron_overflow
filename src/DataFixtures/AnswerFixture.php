<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnswerFixture extends BaseFixture implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [
            UserFixture::class,
        ];
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Answer::class, 100, function (Answer $answer, $count) {
            $answer->setContent($this->faker->boolean ? $this->faker->paragraph(2) : $this->faker->sentences(2, true))
                ->setVote(rand(10, 100))
                ->setAuthor($this->getRandomReference(User::class))
                ->setVoteCount($this->faker->numberBetween(5, 100))
                ->setIsDeleted($this->faker->boolean(20))
                ->setQuestion($this->getRandomReference(Question::class));
        });

        $manager->flush();
    }
}
