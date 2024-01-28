<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const ROMAN_POLICIER = "roman policier";
    public const BANDE_DESSINEE = "bande dessinée";
    public const SCIENCE_FICTION = "science fiction";
        
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $categorie = new Categorie();
        $categorie->setName("Roman policier");
        $categorie->setSlug("roman-policier");
        $categorie->setDescription("Le roman policier est un genre littéraire narratif dont l'intrigue est construite autour d'une enquête criminelle. Le coupable est généralement désigné à la fin du récit, grâce à la perspicacité du héros, qui est souvent un détective privé ou un policier.");
        $categorie->setImageName("romanpolicier.jpg");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->setIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        // On crée une référence pour la catégorie "roman policier" que l'on pourra utiliser dans d'autres fixtures et la catégorie est associée à la constante ROMAN_POLICIER
        $this->addReference(self::ROMAN_POLICIER, $categorie);

        $categorie = new Categorie();
        $categorie->setName("Bande dessinée");
        $categorie->setSlug("bande-dessinee");
        $categorie->setDescription("La bande dessinée est une forme d'expression artistique, souvent désignée comme le « neuvième art », utilisant une juxtaposition de dessins (ou d'autres types d'images fixes, mais pas seulement) et de textes dans le but de raconter une histoire et de transmettre des informations.");
        $categorie->setImageName("bandedessinne.jpg");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->setIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        // On crée une référence pour la catégorie "roman policier" que l'on pourra utiliser dans d'autres fixtures et la catégorie est associée à la constante ROMAN_POLICIER
        $this->addReference(self::BANDE_DESSINEE, $categorie);

        $categorie = new Categorie();
        $categorie->setName("Science fiction");
        $categorie->setSlug("science-fiction");
        $categorie->setDescription("La science-fiction est un genre narratif, principalement littéraire (littérature et bande dessinée), cinématographique et vidéoludique. Comme son nom l'indique, elle consiste à raconter des fictions reposant sur des progrès scientifiques et techniques obtenus dans un futur plus ou moins éloigné du nôtre.");
        $categorie->setImageName("sciencefiction.jpg");
        $categorie->setUpdatedAt(new DateTimeImmutable());
        $categorie->setIsActive(true);
        $manager->persist($categorie);
        $manager->flush();
        // On crée une référence pour la catégorie "roman policier" que l'on pourra utiliser dans d'autres fixtures et la catégorie est associée à la constante ROMAN_POLICIER
        $this->addReference(self::SCIENCE_FICTION, $categorie);
    }
}
