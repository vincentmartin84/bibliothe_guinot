<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Genre;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $genreTitles= ['documentaire','policier','saga','roman','encyclopédie']; 
        // $product = new Product();
        // $manager->persist($product);
        foreach ($genreTitles as $title) {
            
            $genre= new Genre();

            $genre->setTitle($title);
            $manager->persist($genre);
        }

        $manager->flush();
    }
}
