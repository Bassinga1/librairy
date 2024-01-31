<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontLivreController extends AbstractController
{
    #[Route('/livre/{slug}', name: 'app_front_livre')]
    public function index($slug, LivreRepository $livreRepository): Response
    {
        return $this->render('front_livre/index.html.twig', [
            'livre' => $livreRepository->findOneBy(["slug"=>$slug]),
        ]);
    }
}
