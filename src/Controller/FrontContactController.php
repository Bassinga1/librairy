<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontContactController extends AbstractController
{
    #[Route('/contact', name: 'app_front_contact')]
    public function index(Request $request, EntityManagerInterface $em, MailerInterface $mailerInterface): Response
    {
        // On met en place un formulaire de contact
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        // On hydrate le contact avec les données du formulaire posté potentiellement
        $form->handleRequest($request);
        // On vérifie si le formulaire est posté et qu'il est valide
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($contact);
            $em->flush();

            // On prépare le mail text brut
            // $email = (new Email())
            // ->from($contact->getEmail())
            // ->to('admin@verexao.com')
            // ->subject($contact->getSujet())
            // ->text($contact->getMessage());

            // On récupère l'email déclaré dans les paramètres de services.yaml
            $emailContact = $this->getParameter('app.contactEmail');
            // On prépare le mail html
            $email = (new TemplatedEmail())
            ->from($contact->getEmail())
            ->to($emailContact)
            ->subject((!is_null($contact->getSujet())) ? $contact->getSujet() : "")
            ->htmlTemplate('front_contact/email.html.twig')
            ->context([
                'who'=>$contact->getEmail(),
                'sujet'=>$contact->getSujet(),
                'message'=>$contact->getMessage()
            ]);

            // On envoie le mail
            $mailerInterface->send($email);

            // On ajoute un message flash
            $this->addFlash("success", "your message ahas been send");
            // On redirige vers la page d'accueil
            return $this->redirectToRoute('app_home');
        }
        return $this->render('front_contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
