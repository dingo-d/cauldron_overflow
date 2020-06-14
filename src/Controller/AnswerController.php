<?php

/**
 * File holding AnswerController class
 *
 * @since
 * @package App\Controller
 */

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Answer;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * AnswerController class
 *
 * @since
 * @package App\Controller
 */
class AnswerController extends AbstractController
{
  /**
   * @Route("/answers/{id}/vote/{direction<up|down>}", methods="POST")
   *
   * @param Answer $answer
   * @param $direction
   * @param LoggerInterface $logger
   * @param EntityManagerInterface $em
   * @return JsonResponse
   */
  public function answerVote(Answer $answer, $direction, LoggerInterface $logger, EntityManagerInterface $em)
  {
    if ($direction === 'up') {
      $logger->info('Voting up');
      $answer->incrementVote();
      $em->flush();
    } else {
      $logger->info('Voting down');
      $answer->decrementVote();
      $em->flush();
    }

    return $this->json(['votes' => $answer->getVote()]);
  }
}
