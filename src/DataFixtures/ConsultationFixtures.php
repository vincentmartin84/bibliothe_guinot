<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Consultation; 

class ConsultationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $consultationTitle= ['uniquement sur place','à emprunter']; 
        // $product = new Product();
        // $manager->persist($product);
        foreach ($consultationTitle as $title) {
            $consultation = new Consultation();
            $consultation->setTitle($title);
            $manager->persist($consultation);
        }



        $manager->flush();
    }
}
