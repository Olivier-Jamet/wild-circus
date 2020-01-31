<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use App\Entity\Gallerie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class GallerieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 20; $i++) {
            $gallerie = new Gallerie();
            $gallerie-> setArtiste();
            $gallerie->setImage($faker->imageUrl());
            $manager->persist($gallerie);
        }
        $manager->flush();
    }
}
