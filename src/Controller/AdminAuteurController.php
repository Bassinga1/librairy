<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/auteur')]
class AdminAuteurController extends AbstractController
{
    #[Route('/', name: 'app_admin_auteur_index', methods: ['GET'])]
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('admin_auteur/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_auteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Prise en charge du slug
            if(!is_null($auteur->getPseudo())){
                $auteur->setSlug(strtolower($sluggerInterface->slug($auteur->getPseudo())));
            }else{
                $auteur = "";
                if(!is_null($auteur->getLastname())){
                    $auteurName = strtolower($auteur.getLastname());
                }
                if(!is_null($auteur->getName())){
                    $auteurName .= " ".strtolower($auteur.getName());
                }
                $auteur->setSlug($sluggerInterface->slug(trim($auteurName)));
            }
            // Mise en place du message flash
            // $this->addFlash('success', 'auteur has been created!');
            $entityManager->persist($auteur);
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'auteur has been created!');

            return $this->redirectToRoute('app_admin_auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_auteur/new.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_auteur_show', methods: ['GET'])]
    public function show(Auteur $auteur): Response
    {
        return $this->render('admin_auteur/show.html.twig', [
            'auteur' => $auteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_auteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Auteur $auteur, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Prise en charge du slug
            if(!is_null($auteur->getPseudo())){
                $auteur->setSlug(strtolower($sluggerInterface->slug($auteur->getPseudo())));
            }else{
                $auteur = "";
                if(!is_null($auteur->getLastname())){
                    $auteurName = strtolower($auteur.getLastname());
                }
                if(!is_null($auteur->getName())){
                    $auteurName .= " ".strtolower($auteur.getName());
                }
                $auteur->setSlug($sluggerInterface->slug(trim($auteurName)));
            }
            // Mise en place du message flash
            // $this->addFlash('success', 'auteur has been modified!');
            $entityManager->persist($auteur);
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'auteur has been modified!');

            return $this->redirectToRoute('app_admin_auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_auteur/edit.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_auteur_delete', methods: ['POST'])]
    public function delete(Request $request, Auteur $auteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($auteur);
            $entityManager->flush();
            // Flash méssage
            $this->addFlash('success', 'auteur has been deleted!');
        }

        return $this->redirectToRoute('app_admin_auteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
