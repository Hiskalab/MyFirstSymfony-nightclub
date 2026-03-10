<?php
    namespace App\DataFixtures;

use App\Factory\MaterielFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


    class MaterielFixtures extends Fixture
    {
    public function load(ObjectManager $manager): void
    {
        MaterielFactory::createMany(5);
    }
    }
?>