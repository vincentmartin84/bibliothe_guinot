<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Available;
class AvailableFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $availableTitles = ['disponible', 'non disponible', 'emprunté'];

        foreach ($availableTitles as $title) {
            $available = new Available();
            $available->setTitle($title);
            $manager->persist($available);
        }

        $manager->flush();
    }
}
