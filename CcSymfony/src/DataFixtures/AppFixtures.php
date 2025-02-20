<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Atelier;

class AppFixtures extends Fixture

{


    // Le constructeur pour injecter l'encodeur de mot de passe

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        $manager->flush();
    }
}
