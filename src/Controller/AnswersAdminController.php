<?php

namespace App\Controller;

use App\Repository\AnswerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnswersAdminController extends AbstractController
{
    /**
     * @Route("/admin/answers", name="answers_admin")
     */
    public function index(AnswerRepository $repository)
    {
        $answers = $repository->findBy([], ['vote' => 'DESC']);

        return $this->render('answers_admin/index.html.twig', [
            'answers' => $answers
        ]);
    }
}
