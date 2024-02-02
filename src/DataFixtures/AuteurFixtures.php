<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $auteur = new Auteur();
        $auteur->setName("Saussey");
        $auteur->setLastname("Jacques");
        $auteur->setSlug("jacques-saussey");
        $auteur->setBiography("Jacques Saussey est un auteur incontournable dans le milieu du polar français. Pour son arrivée au Fleuve, il signe un thriller ambitieux entre le paradis et l’enfer.");
        $auteur->setImageName("jacquessaussey.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::CE_QU_IL_FAUT_DE_HAINE));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("James");
        $auteur->setLastname("Peter");
        $auteur->setSlug("james-peter");
        $auteur->setBiography("Peter James est né en 1948, à Brighton. Après plusieurs années passées aux États-Unis en tant que scénariste et producteur de cinéma, il est retourné s’installer en Angleterre.");
        $auteur->setImageName("peterjames.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::CHAQUE_SECONDE_COMPTE));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("Barton");
        $auteur->setLastname("Fiona");
        $auteur->setSlug("barton-fiona");
        $auteur->setBiography("Fiona Barton, née à Cambridge, est journaliste et a travaillé au Daily Mail, au Daily Telegraph et au Mail on Sunday. Elle a remporté le prix de « Reporter de l’année » aux British Press Awards.");
        $auteur->setImageName("bartonfiona.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::L_EAU_QUI_DORT));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("Le Tendre");
        $auteur->setLastname("Serge");
        $auteur->setSlug("serge-letendre");
        $auteur->setBiography("Serge Le Tendre présentant la couverture du tome 1 de l'intégrale de la série, représentant les personnages de Bragon et Pélisse. Un buste en résine de Bragon se trouve à ses côtés.");
        $auteur->setImageName("sergeletendre.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::LA_QUETE_DE_L_OISEAU_DU_TEMPS));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("Froideval");
        $auteur->setLastname("François");
        $auteur->setSlug("francois-froideval");
        $auteur->setBiography("François Marcela-Froideval, né le 10 décembre 1958, est un scénariste de bande dessinée, de jeu vidéo et de jeu de rôle.");
        $auteur->setImageName("francoisfroideval.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::LA_QUETE_DE_L_OISEAU_DU_TEMPS));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("Roba");
        $auteur->setLastname("Jean");
        $auteur->setSlug("jean-roba");
        $auteur->setBiography("Jean Roba, dit Roba, né le 28 juillet 1930 à Schaerbeek (province de Brabant), et mort le 14 juin 2006 à Bruxelles (région de Bruxelles-Capitale), est un auteur de bande dessinée.");
        $auteur->setImageName("jeanroba.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::LA_QUETE_DE_L_OISEAU_DU_TEMPS));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("Asimov");
        $auteur->setLastname("Isaac");
        $auteur->setSlug("isaac-asimov");
        $auteur->setBiography("Isaac Asimov était un écrivain américain et professeur de biochimie à l'Université de Boston. De son vivant, Asimov était considéré comme l'un des « trois grands » écrivains de science-fiction, avec Robert A. Heinlein et Arthur C. Clarke.");
        $auteur->setImageName("isaacasimov.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::PRELUDE_A_LA_FONDATION));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("Poul");
        $auteur->setLastname("Anderson");
        $auteur->setSlug("anderson-poul");
        $auteur->setBiography("Poul Anderson, né le 25 novembre 1926 à Bristol en Pennsylvanie et mort le 31 juillet 2001 (à 74 ans) à Orinda en Californie, est un écrivain américain de science-fiction et de fantasy.");
        $auteur->setImageName("poulanderson.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::LA_HANSE_GALACTIQUE_TOME_1_LE_PRINCE_MARCHAND));
        $manager->persist($auteur);

        $auteur = new Auteur();
        $auteur->setName("Haslund");
        $auteur->setLastname("Rakel");
        $auteur->setSlug("rakel-haslund");
        $auteur->setBiography("Rakel Haslund n'a pas encore rendu public sa biography.");
        $auteur->setImageName("rakelhaslund.jpg");
        // $auteur->setLivre($this->getReference(LivreFixtures::APRES_NOUS_LES_OISEAUX));
        $manager->persist($auteur);

        $manager->flush();
    }
}
