<?php

/**
 * File holding BaseFixtures class
 *
 * @since
 * @package App\DataFixtures
 */

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * BaseFixtures class
 *
 * @since
 * @package App\DataFixtures
 */
abstract class BaseFixture extends Fixture
{

  /**
   * @var ObjectManager
   */
  private $manager;

  /**
   * @inheritDoc
   */
  public function load(ObjectManager $manager)
  {
    $this->manager = $manager;

    $this->loadData($manager);
  }

  abstract protected function loadData(ObjectManager $em);

  protected function createMany(string $className, int $count, callable $factory)
  {
    for ($i = 0; $i < $count; $i++) {
      $entity = new $className();
      $factory($entity, $i);
      $this->manager->persist($entity);
      // store for usage later as App\Entity\ClassName_#COUNT#
      $this->addReference($className . '_' . $i, $entity);
    }
  }
}
