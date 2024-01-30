<?php

namespace App\DataFixtures;

use App\Entity\Image;
use DateTimeImmutable;
use App\DataFixtures\LivreFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $image = new Image();
        $image->setImageName('ce-qu-il-faut-de-haine.jpg');
        $image->setLivre($this->getReference(LivreFixtures::CE_QU_IL_FAUT_DE_HAINE));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('chaque-seconde-compte.jpg');
        $image->setLivre($this->getReference(LivreFixtures::CHAQUE_SECONDE_COMPTE));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('l-eau-qui-dort.jpg');
        $image->setLivre($this->getReference(LivreFixtures::L_EAU_QUI_DORT));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('quete-de-loiseau-du-temps-la-tome-1-conque-de-ramor-la.jpg');
        $image->setLivre($this->getReference(LivreFixtures::LA_QUETE_DE_L_OISEAU_DU_TEMPS));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('les-chroniques-de-la-lune-noire-tome-1-signe-des-tenebres-le.jpg');
        $image->setLivre($this->getReference(LivreFixtures::LES_CHRONIQUES_DE_LA_LUNE_NOIRE));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('boule-bill-tome-25-les-vla.jpg');
        $image->setLivre($this->getReference(LivreFixtures::BOULE_BILL_TOME_25));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('prelude-a-la-fondation.jpg');
        $image->setLivre($this->getReference(LivreFixtures::PRELUDE_A_LA_FONDATION));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('la-hanse-galactique.jpg');
        $image->setLivre($this->getReference(LivreFixtures::LA_HANSE_GALACTIQUE_TOME_1_LE_PRINCE_MARCHAND));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('apres-nous-les-oiseaux.jpg');
        $image->setLivre($this->getReference(LivreFixtures::APRES_NOUS_LES_OISEAUX));
        $image->setRankNumber(1);
        $image->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($image);
        $manager->flush();
    }
    public function getDependencies():array{
        return[
            LivreFixtures::class
        ];
    }
}
