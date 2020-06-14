<?php

namespace App\Controller;

use App\Repository\AnswerRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnswersAdminController extends AbstractController
{
    /**
     * @Route("/admin/answers", name="answers_admin")
     */
    public function index(AnswerRepository $repository, Request $request, PaginatorInterface $paginator)
    {
        $q = $request->query->get('q');

        $queryBuilder = $repository->getWithSearchQueryBuilder($q);

        $pagination = $paginator->paginate(
            $queryBuilder, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('answers_admin/index.html.twig', [
            'pagination' => $pagination
        ]);
    }
}
