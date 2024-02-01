<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Form\UserType;
use App\Repository\LivreRepository;
use App\Repository\FavoriRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontUserController extends AbstractController
{
    // Favori management
    #[Route('/favoris/add', methods: ['POST'])]
    public function addFavorite(Request $request, LivreRepository $livreRepository, EntityManagerInterface $entityManager, FavoriRepository $favoriRepository): JsonResponse
    {
        // On récupère l'utilisateur connecté
        $user = $this->getUser();
        // On récupère le livre à ajouter aux favoris
        $livre = $livreRepository->find($request->request->get('idLivre'));
        // On fait un switch pour savoir si on ajoute ou on supprime le favori
        switch($request->request->get('action')){
            case 'add':
            // On crée un favori
            $favori = new Favori();
            $favori->setUser($user);
            $favori->setLivre($livre);
            // On mémorise le favori
            $entityManager->persist($favori);
            break;
            case 'remove':
            // On récupère le favori
            $favori = $favoriRepository->findOneBy(['user'=>$user, 'livre'=>$livre]);
            // On supprime le favori
            $entityManager->remove($favori);
        }
        // On met en BDD
        $entityManager->flush();
        
        return new JsonResponse(["message"=>"ok"]);
    }
    
    #[Route('/user', name: 'app_front_user')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        // On récupère les utilisateurs connectés
        $user = $this->getUser();
        // on crée un formulaire de user avec les datas du user connecté et on le passe à la vue
        $form = $this->createForm(UserType::class, $user);
        // On hydrate le user avec les données du formulaire posté potentiellement
        $form->handleRequest($request);
        // On vérifie que le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
            // dd($form->getData()); // Récupérer l'instance du User mais pas les propriétés mapped false
            // dd($form->all()); // Récupérer toutes les données (champs) du formulaire y compris les mapped false
            //dd($form->get('plainPassword')->getData()); // On récupére la données d'un champ en particulier y compris les mapped false
            //dd($request->request->get('plainPassword')); // On récupère la valeur d'un champ non pas dans le formulaire, mais dans la requête. $request->request récupère les données de la requête POST pour la requête GET il faut utiliser $request->query
            if(!is_null($request->request->get('plainPassword'))){
                $user->setPassword($userPasswordHasherInterface->hashPassword($user, $request->request->get('plainPassword')));
                $entityManagerInterface->persist($user);
            }
            $entityManagerInterface->flush();
            $this->addFlash("success", "Profil has been modified!");
            // On redirige vers la page de profil
            return $this->redirectToRoute('app_front_user');
        }
        return $this->render('front_user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
