<?php

namespace App\Controller;

use App\Repository\AnswerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnswersAdminController extends AbstractController
{
    /**
     * @Route("/admin/answers", name="answers_admin")
     */
    public function index(AnswerRepository $repository, Request $request)
    {
        $q = $request->query->get('q');

        $answers = $repository->findAllWIthSearch($q);

        return $this->render('answers_admin/index.html.twig', [
            'answers' => $answers
        ]);
    }
}
