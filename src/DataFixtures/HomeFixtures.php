<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitle('Librairie, your business partner, towards excellence in integrated logistics services support!');
        $home->setText('Providing integrating logistics support, ensuring all OSC and O&G companies operating in our Base the total quality service, safe operations and satisfaction.');
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitle('Librairie, your business partner, towards excellence in integrated logistics services support!');
        $home->setText('With Librairie ensure your integrated logistics supoort as an OSC and O&G company operating in our Base for the total quality service, safe operations and satisfaction.');
        $home->setIsActive(false);
        $manager->persist($home);

        $manager->flush();
    }
}
