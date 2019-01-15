<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontPageController extends AbstractController
{
    /**
     * @Route("/", name="front_page")
     */
    public function index()
    {
        return $this->render('front_page/index.html.twig', [
            'controller_name' => 'FrontPageController',
        ]);
    }
}
