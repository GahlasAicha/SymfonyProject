<?php

namespace App\DataFixtures;
use Faker\Factory;
use App\Entity\Atelier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AtelierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $atelier = new Atelier();
            $atelier->setNom($faker->company())
                ->setDescription($faker->realText(100));
            $manager->persist($atelier);
        }

        $manager->flush();
    }
}
