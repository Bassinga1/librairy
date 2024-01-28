<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LivreFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const CE_QU_IL_FAUT_DE_HAINE = "ce-qu-il-faut-de-haine";
    public const CHAQUE_SECONDE_COMPTE = "chaque-seconde-compte";
    public const L_EAU_QUI_DORT = "l-eau-qui-dort";
    public const LA_QUETE_DE_L_OISEAU_DU_TEMPS = "la-quete-de-l-oiseau-du-temps";
    public const LES_CHRONIQUES_DE_LA_LUNE_NOIRE = "les-chroniques-de-la-lune-noire";
    public const BOULE_BILL_TOME_25 = "boule-bill-tome-25";
    public const PRELUDE_A_LA_FONDATION = "prelude-a-la-fondation";
    public const LA_HANSE_GALACTIQUE_TOME_1_LE_PRINCE_MARCHAND = "la-hanse-galactique-tome-1-le-prince-marchand";
    public const APRES_NOUS_LES_OISEAUX = "apres-nous-les-oiseaux";
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $livre = new Livre();
        $livre->setTitle("Ce qu'il faut de haine");
        $livre->setSlug("ce-qu-il-faut-de-haine");
        $livre->setDescription("Ce matin-là, comme tous les dimanches, Alice Pernelle s’éclipse de la maison de ses parents pour aller courir avec son chien. Mais en arrivant au bord de la Cure, cette rivière qui traverse son village natal, un tableau macabre lui coupe les jambes et lui soulève l’estomac. Un corps écartelé...");
        $livre->setPrice(21.90);
        $livre->setIsActive(true);
        $livre->setCategorie($this->getReference(CategorieFixtures::ROMAN_POLICIER));
        $manager->persist($livre);
        $this->addReference(self::CE_QU_IL_FAUT_DE_HAINE, $livre);

        $livre = new Livre();
        $livre->setTitle("Chaque seconde compte");
        $livre->setSlug("chaque-seconde-compte");
        $livre->setDescription("Brighton, 2018.
        Lors du premier match de foot de l'année qui réunit plus de 30 000 spectateurs, un membre de la sécurité du stade tente désespérément de déjouer une alerte à la bombe. Au même moment, dans les tribunes, un homme d'affaires prospère et joueur compulsif reçoit un message terrifiant : son fils...");
        $livre->setPrice(22.90);
        $livre->setIsActive(true);
        $livre->setCategorie($this->getReference(CategorieFixtures::ROMAN_POLICIER));
        $manager->persist($livre);
        $this->addReference(self::CHAQUE_SECONDE_COMPTE, $livre);

        $livre = new Livre();
        $livre->setTitle("L'eau qui dort");
        $livre->setSlug("l-eau-qui-dort");
        $livre->setDescription("À la suite d'une opération médicale, l'inspectrice Elise King pensait qu'Ebbing, petite ville de bord de mer, serait parfaite pour sa convalescence. Mais rapidement, elle se rend compte que l’atmosphère est pesante entre les locaux qui triment quotidiennement pour joindre les deux bouts et les citadins qui viennent profiter de...");
        $livre->setPrice(22.90);
        $livre->setIsActive(true);
        $livre->setCategorie($this->getReference(CategorieFixtures::ROMAN_POLICIER));
        $manager->persist($livre);
        $this->addReference(self::L_EAU_QUI_DORT, $livre);

        $livre = new Livre();
        $livre->setTitle("La Quête de l'Oiseau du Temps");
        $livre->setSlug("la-quete-de-l-oiseau-du-temps");
        $livre->setDescription("Le légendaire chevalier Bragon pense en avoir fini avec sa vie aventureuse dont les exploits ont fait les heures les plus riches des conteurs d'Akbar. À présent qu'il est vieux, il n'aspire plus qu'au repos, retiré qu'il est dans sa ferme des hauts plateaux du Médir. Mais la tranquillité n'est pas de mise pour les héros. Un jour vient à lui Pélisse, jeune vierge sauvage et rousse aux formes généreuses, accompagnée de son Fourreux, animal étrange aux mystérieux pouvoirs. Elle lui apporte un message de sa mère, la princesse-sorcière Mara, elle même...");
        $livre->setPrice(15.95);
        $livre->setIsActive(true);
        $livre->setCategorie($this->getReference(CategorieFixtures::BANDE_DESSINEE));
        $manager->persist($livre);
        $this->addReference(self::LA_QUETE_DE_L_OISEAU_DU_TEMPS, $livre);

        $livre = new Livre();
        $livre->setTitle("Les Chroniques de la Lune noire");
        $livre->setSlug("les-chroniques-de-la-lune-noire");
        $livre->setDescription("Au centre de l'Empire se trouvait l'Oracle...
        Et un jour sa voix annonça la venue de celui qui allait boulverser le monde. Voici son histoire et celle de ses compagnons, barbares et guerriers, canailles et mercenaires...
        Et celle du terrible chien de guerre à qui l'Empereur confia la mission de les détruire.
        De peur que les ténèbres...");
        $livre->setPrice(15.95);
        $livre->setIsActive(true);
        $livre->setCategorie($this->getReference(CategorieFixtures::BANDE_DESSINEE));
        $manager->persist($livre);
        $this->addReference(self::LES_CHRONIQUES_DE_LA_LUNE_NOIRE, $livre);

        $livre = new Livre();
        $livre->setTitle("Boule & Bill - Tome 25");
        $livre->setSlug("boule-bill-tome-25");
        $livre->setDescription("Boule est un petit garçon facétieux qui vit entre sa mère (exemplaire), son père ( \"bricoleur\" et gaffeur) et Bill (gentil cocker). Cette bande typiquement familiale a débuté dans les pages de 'SPIROU' en 1959. Si Boule apparaît dans tous les gags, Bill lui ravit rapidement la vedette. Ce chien farfelu apprécie bien sûr les os, les jolies chiennes, sa copine la tortue, ses amis les oiseaux et son jeune maître (Boule). De son trait rond, et jovial, l'auteur décrit par une suite de gags les aventures quotidiennes de cette famille particulièrement sympathique...
        ");
        $livre->setPrice(15.95);
        $livre->setIsActive(true);
        $livre->setCategorie($this->getReference(CategorieFixtures::BANDE_DESSINEE));
        $manager->persist($livre);
        $this->addReference(self::BOULE_BILL_TOME_25, $livre);

        $livre = new Livre();
        $livre->setTitle("Prélude à la fondation");
        $livre->setSlug("prelude-a-la-fondation");
        $livre->setDescription("Hari Seldon venait d'inventer la psychohistoire et il n'y voyait qu'une pure spéculation, sans application pratique. La psychohistoire ne pouvait pas prédire l'avenir ? Les politiques s'en moquaient. Les gens allaient y croire. Ensuite, les équations diraient ce qu'on leur ferait dire. Et si Seldon n'était pas d'accord, tant pis pour lui !
        Alors, le jeune chercheur s'enfuit. Traqué, il sillonna les dédales souterrains de la planète Trantor, capitale de l'Empire galactique. Et ce qu'il vit le stupéfia. Un avenir inquiétant se dessinait sous ses yeux. Était-il trop tard pour éviter la catastrophe ?");
        $livre->setIsActive(true);
        $livre->setPrice(8.60);
        $livre->setCategorie($this->getReference(CategorieFixtures::SCIENCE_FICTION));
        $manager->persist($livre);
        $this->setReference(self::PRELUDE_A_LA_FONDATION, $livre);

        $livre = new Livre();
        $livre->setTitle("La hanse galactique: Tome 1 Le prince marchand");
        $livre->setSlug("la-hanse-galactique-tome-1-le-prince-marchand");
        $livre->setDescription("XXIIIe siècle. Nicholas Van Rijn dirige la Compagnie solaire des épices et liqueurs au sein de la Ligue polesotechnique, l'alliance des négociants interstellaires. La Ligue transcende toutes les frontières politiques, et son pouvoir est à la mesure de l'étendue des routes commerciales : pour le moins considérable.Des princes-marchands parcourant l'univers, Van Rijn est probablement le plus flamboyant, truculent et ingénieux. Débonnaire et fin négociateur, il arpente les mondes, mettant sa verve et son panache au service de ses intérêts et de ceux de la Ligue. Voici ses aventures...");
        $livre->setIsActive(true);
        $livre->setPrice(8.60);
        $livre->setCategorie($this->getReference(CategorieFixtures::SCIENCE_FICTION));
        $manager->persist($livre);
        $this->setReference(self::LA_HANSE_GALACTIQUE_TOME_1_LE_PRINCE_MARCHAND, $livre);

        $livre = new Livre();
        $livre->setTitle("Après nous les oiseaux");
        $livre->setSlug("apres-nous-les-oiseaux");
        $livre->setDescription("La nouvelle voix enchanteresse de la science-fiction danoise, Prix Michael Strunge
        Quelque chose est arrivé. Le monde est en ruine. Il ne reste qu’une survivante. Assoiffée de grand air et de large, elle doit s’aventurer hors de ses repères. Dans l’oubli hypnotique du monde d’avant, elle marche, sans s’arrêter, jusqu’à apercevoir la mer. Bientôt elle sent son identité lui échapper. La nature a repris ses droits. Comment vivre désormais ?");
        $livre->setIsActive(true);
        $livre->setPrice(18.00);
        $livre->setCategorie($this->getReference(CategorieFixtures::SCIENCE_FICTION));
        $manager->persist($livre);
        $this->setReference(self::APRES_NOUS_LES_OISEAUX, $livre);

        $manager->flush();
    }
}
