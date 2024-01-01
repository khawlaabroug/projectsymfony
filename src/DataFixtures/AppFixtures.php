<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\ChercheurFactory;
use App\Factory\EquipementFactory;
use App\Factory\ProjetFactory;
use App\Factory\PublicationFactory;
use App\Factory\UserFactory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        ChercheurFactory::createMany(50);
        EquipementFactory::createMany(10);
        ProjetFactory::createMany(100);
        PublicationFactory::createMany(100);
        UserFactory::createMany(1);
        $manager->flush();
    }
}
