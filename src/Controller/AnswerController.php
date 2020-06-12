<?php

/**
 * File holding AnswerController class
 *
 * @since
 * @package App\Controller
 */

declare(strict_types=1);

namespace App\Controller;

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
   * @param $id
   * @param $direction
   * @param LoggerInterface $logger
   * @return JsonResponse
   */
  public function answerVote($id, $direction, LoggerInterface $logger)
  {
    if ($direction === 'up') {
      $logger->info('Voting up');
      $currentVoteCount = rand(7, 100);
    } else {
      $logger->info('Voting down');
      $currentVoteCount = rand(0, 5);
    }

    return $this->json(['votes' => $currentVoteCount]);
  }
}