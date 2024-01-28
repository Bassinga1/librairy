<?php

namespace App\Controller;

use App\Repository\HomeRepository;
use App\Repository\CarouselRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    #[Route('/', name: 'app_home2')]
    public function index(CarouselRepository $carouselRepository, HomeRepository $homeRepository): Response
    {
        // On récupère la home ayant la props isActive à la valeur true
        $home = $homeRepository->findOneBy(["isActive"=>true]);
        // On appelle dd
        // dd($home);
        // On récupère les carousels ayant la prop isActive à la valeur true et la prop tag à la valeur "home"
        $carousels = $carouselRepository->findBy(["isActive"=>true, "tag"=>"home"], ["rankNumber"=>"ASC"]);
        // dd($carousels);
        return $this->render('home/index.html.twig', [
            'home' => $home,
            'carousels' => $carousels
        ]);
    }
}
