<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Author; // Assure-toi d'importer la classe Author correctement

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $authorsData = [
            ['lastname' => 'Hugo', 'firstname' => 'Victor'],
            ['lastname' => 'Dumas', 'firstname' => 'Alexandre'],
            ['lastname' => 'Sand', 'firstname' => 'George'],
            ['lastname' => 'Genevoix', 'firstname' => 'Maurice'],
            ['lastname' => 'Sagan', 'firstname' => 'Françoise'],
        ];

        foreach ($authorsData as $authorData) {
            $author = new Author();
            $author->setLastname($authorData['lastname'])
                ->setFirstname($authorData['firstname']);

            $manager->persist($author);
        }

        $manager->flush();
    }
}
