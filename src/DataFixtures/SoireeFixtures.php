<?php
    namespace App\DataFixtures;

use App\Factory\SoireeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


    class SoireeFixtures extends Fixture
    {
    public function load(ObjectManager $manager): void
    {
        SoireeFactory::createMany(5);
    }
    }
?>