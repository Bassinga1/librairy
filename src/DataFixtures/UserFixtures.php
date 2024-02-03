<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $encoder; // pour le hashage du mot de passe
    // ====================================================== //
    // ===================== CONSTRUCTOR ==================== //
    // ====================================================== //
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    // ====================================================== //
    // ===================== METHODES ==================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('Bass');
        $user->setLastname('Prince');
        $user->setEmail('prince.bass02@gmail.com');
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user, "orvalha"));
        $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
        $user->setName('Benis');
        $user->setLastname('Prib');
        $user->setEmail('pribenis@gmail.com');
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->encoder->hashPassword($user, "orvalha1"));
        $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['user'];
    }
}
