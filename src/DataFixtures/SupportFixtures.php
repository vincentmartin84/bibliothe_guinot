<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Support; 

class SupportFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $supportTitles= ['livre','CD','DVD','microfilm','journal']; 
        // $product = new Product();
        // $manager->persist($product);
        foreach($supportTitles as $title) {
            $support= new Support();

            $support->setTitle($title);
            $manager->persist($support);

        }

        $manager->flush();
    }
}
