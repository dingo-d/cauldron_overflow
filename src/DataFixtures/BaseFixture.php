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
use Faker\Factory;
use Faker\Generator;

/**
 * BaseFixtures class
 *
 * @since
 * @package App\DataFixtures
 */
abstract class BaseFixture extends Fixture
{

  /**
   * @var Generator
   */
  protected $faker;
  /**
   * @var ObjectManager
   */
  private $manager;

  private $referencesIndex = [];

  /**
   * @inheritDoc
   */
  public function load(ObjectManager $manager)
  {
    $this->manager = $manager;
    $this->faker = Factory::create();

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

  protected function getRandomReferences(string $className, int $count)
  {
    $references = [];
    while (count($references) < $count) {
      $references[] = $this->getRandomReference($className);
    }

    return $references;
  }

  protected function getRandomReference(string $className)
  {
    if (!isset($this->referencesIndex[$className])) {
      $this->referencesIndex[$className] = [];

      foreach ($this->referenceRepository->getReferences() as $key => $ref) {
        if (strpos($key, $className . '_') === 0) {
          $this->referencesIndex[$className][] = $key;
        }
      }
    }

    if (empty($this->referencesIndex[$className])) {
      throw new \Exception(sprintf('Cannot find any references for class "%s"', $className));
    }

    $randomReferenceKey = $this->faker->randomElement($this->referencesIndex[$className]);

    return $this->getReference($randomReferenceKey);
  }
}
