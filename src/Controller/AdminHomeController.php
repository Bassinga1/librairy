<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/home')]
class AdminHomeController extends AbstractController
{
    #[Route('/', name: 'app_admin_home_index', methods: ['GET'])]
    public function index(HomeRepository $homeRepository): Response
    {
        return $this->render('admin_home/index.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_home_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // On instancie un nouvel objet Home
        $home = new Home();
        // On crée un formulaire de home en utilisant la classe HomeType
        $form = $this->createForm(HomeType::class, $home);
        // On traite le formulaire (l'hydratation)
        $form->handleRequest($request); // l'hydratation de l'objet $home avec les données se trouvant dans $request

        // Si le formulaire est soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // On mémorise l'instance de Home ($home)
            $entityManager->persist($home);
            // On enregistre dans la BDD
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'home has been created!');
            
            // On rédirrige vers la listes des homes
            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }
        // Si le formulaire n'est pas soumis ou n'est pas valide, on affiche le formulaire
        return $this->renderForm('admin_home/new.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_show', methods: ['GET'])]
    public function show(Home $home): Response
    {
        return $this->render('admin_home/show.html.twig', [
            'home' => $home,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_home_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Home $home, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'Home has been modified!');

            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_home/edit.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_delete', methods: ['POST'])]
    public function delete(Request $request, Home $home, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$home->getId(), $request->request->get('_token'))) {
            $entityManager->remove($home);
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'Home has been deleted!');
        }

        return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
    }
}
