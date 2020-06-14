<?php

/**
 * File holding QuestionController class
 *
 * @since
 * @package App\Controller
 */

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Question;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * QuestionController class
 *
 * @since
 * @package App\Controller
 */
class QuestionController extends AbstractController
{
  private $logger;

  private $isDebug;

  public function __construct(LoggerInterface $logger, bool $isDebug)
  {
    $this->logger = $logger;
    $this->isDebug = $isDebug;
  }

  /**
   * @Route("/", name="app_homepage")
   */
  public function homepage(QuestionRepository $questionRepository, AnswerRepository $answerRepository)
  {
    /**
     * Example using a service.
     *
     * You need to add Environment $twigEnvironment as the method argument
     *
     * $html = $twigEnvironment->render('question/homepage.html.twig');
     *
     * return new Response($html);
     */

    $questions = $questionRepository->findAll();

    $answersNumberData = $answerRepository->findNumberOfAnswersForQuestions();

    $answersNumber = [];

    foreach ($answersNumberData as $answersNumberSingle) {
      $answersNumber[$answersNumberSingle['question_id']] = $answersNumberSingle['answer_number'];
    }

    return $this->render('question/homepage.html.twig', [
      'questions' => $questions,
      'answerData' => $answersNumber,
    ]);

  }

  /**
   * @Route("/questions/{slug}", name="app_question_show")
   */
  public function show(Question $question)
  {
    if ($this->isDebug) {
      $this->logger->info('We are in debug mode');
    }

    $answers = $question->getAnswer();

    return $this->render('question/show.html.twig', [
      'question' => $question,
      'answers'  => $answers,
    ]);
  }
}
