<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontAuteurController extends AbstractController
{
    #[Route('/auteur', name: 'app_front_auteur')]
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('front_auteur/index.html.twig', [
            'auteurs' => $auteurRepository->findBy([], ["name"=>"ASC"]),
        ]);
    }
    #[Route('/auteur/{slug}', name: 'app_front_auteur_show')]
    public function show($slug, AuteurRepository $auteurRepository): Response
    {
        return $this->render('front_auteur/show.html.twig', [
            'auteur' => $auteurRepository->findOneBy(["slug"=>$slug]),
        ]);
    }
}
