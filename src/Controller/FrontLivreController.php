<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontLivreController extends AbstractController
{
    #[Route('/livre/{slug}', name: 'app_front_livre')]
    public function index($slug): Response
    {
        return $this->render('front_livre/index.html.twig', [
            'controller_name' => 'FrontLivreController',
        ]);
    }
}
