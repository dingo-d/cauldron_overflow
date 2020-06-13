<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
  protected function loadData(ObjectManager $manager)
  {

    $this->createMany(User::class, 20, function (User $user) {
      $user->setName($this->faker->name)
        ->setEmail($this->faker->email)
        ->setRegisteredAt($this->faker->dateTimeBetween('-100 days', '-1 days'));
    });

    $manager->flush();
  }
}
