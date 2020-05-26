<?php

/**
 * File holding QuestionController class
 *
 * @since
 * @package App\Controller
 */

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * QuestionController class
 *
 * @since
 * @package App\Controller
 */
class QuestionController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('What a bewitching controller we have conjured!');
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
         'Future page to show a question "%s"!',
         ucwords(str_replace('-', ' ', $slug))
        ));
    }
}
