<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/categorie')]
class AdminCategorieController extends AbstractController
{
    #[Route('/', name: 'app_admin_categorie_index', methods: ['GET'])]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('admin_categorie/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_categorie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On génére le slug de la catégorie car il est obligatoire et n'est pas présent dans le formulaire
            $categorie->setSlug($sluggerInterface->slug(strtolower($categorie->getName())));
            $entityManager->persist($categorie);
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'Catégorie has been created!');

            return $this->redirectToRoute('app_admin_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie/new.html.twig', [
            'categorie' => $categorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_categorie_show', methods: ['GET'])]
    public function show(Categorie $categorie): Response
    {
        return $this->render('admin_categorie/show.html.twig', [
            'categorie' => $categorie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_categorie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categorie $categorie, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //On génére le slug de la catégorie car il est obligatoire et n'est pas présent dans le formulaire
            $categorie->setSlug($sluggerInterface->slug(strtolower($categorie->getName())));
            $entityManager->persist($categorie);
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'Catégorie has been modified!');

            return $this->redirectToRoute('app_admin_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie/edit.html.twig', [
            'categorie' => $categorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_categorie_delete', methods: ['POST'])]
    public function delete(Request $request, Categorie $categorie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($categorie);
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'Catégorie has been deleted!');
        }

        return $this->redirectToRoute('app_admin_categorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
