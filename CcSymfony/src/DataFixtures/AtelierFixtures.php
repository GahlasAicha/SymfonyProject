<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use App\Entity\Atelier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class AtelierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Création de 5 instructeurs
        $instructeurs = [];
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($faker->email());
           // var_dump($user->getEmail());
            $user->setPassword('secret');
            $manager->persist($user);
            $instructeurs[] = $user;
        }

        // Création de 10 ateliers
        for ($i = 0; $i < 10; $i++) {
            $atelier = new Atelier();
            $atelier->setNom($faker->company())
                ->setDescription($faker->realText(100));
            $atelier->setInstructeur($faker->randomElement($instructeurs));

            $manager->persist($atelier);
        }

        $manager->flush();
    }
}
