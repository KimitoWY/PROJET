<?php

namespace App\DataFixtures;

use App\Entity\Good;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VenteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /*
         * Création des produits
         * */

        $good1 = new Good();
        $good1
            ->setLabel('Stylo plume')
            ->setPrice(10.99)
            ->setStock(10);
        $manager->persist($good1);

        $good2 = new Good();
        $good2
            ->setLabel('Règle 25cm')
            ->setPrice(2.99)
            ->setStock(30);
        $manager->persist($good2);

        $good3 = new Good();
        $good3
            ->setLabel('Cartouche d\'encre')
            ->setPrice(0.99)
            ->setStock(80);
        $manager->persist($good3);

        $good4 = new Good();
        $good4
            ->setLabel('Colle')
            ->setPrice(4.99)
            ->setStock(40);
        $manager->persist($good4);

        $good5 = new Good();
        $good5
            ->setLabel('Ciseaux')
            ->setPrice(7.99)
            ->setStock(20);
        $manager->persist($good5);

        $manager->flush();
    }
}
