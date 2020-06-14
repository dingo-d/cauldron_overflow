<?php

namespace App\Repository;

use App\Entity\Answer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Answer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Answer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Answer[]    findAll()
 * @method Answer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnswerRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Answer::class);
  }

  public function findNumberOfAnswersForQuestions()
  {
    return $this->getOrCreateQueryBuilder()
      ->select('IDENTITY(an.question) as question_id, count(an.question) as answer_number')
      ->groupBy('an.question')
      ->getQuery()
      ->getResult();
  }

  private function getOrCreateQueryBuilder(QueryBuilder $qb = null)
  {
    return $qb ?: $this->createQueryBuilder('an');
  }

}
