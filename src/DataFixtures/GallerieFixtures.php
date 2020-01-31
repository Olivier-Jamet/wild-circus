<?php

namespace App\DataFixtures;

use App\Entity\Gallerie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GallerieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 15; $i++) {
            $gallerie = new Gallerie();
            $gallerie->setImage($faker->imageUrl());
            $manager->persist($gallerie);
        }
        $manager->flush();
    }
}
