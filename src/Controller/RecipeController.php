<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class RecipeController extends ApiController
{
    /**
     * @Route("/recipe", name="recipe")
     */
    public function index()
    {
        return $this->respond([
            'title' => 'Guess what?',
            'another_attribute' => 2,
        ]);
    }
}
