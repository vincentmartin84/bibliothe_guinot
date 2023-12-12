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
            ['lastname' => 'Giono', 'firstname' => 'Jean'],
            ['lastname' => 'pagnol', 'firstname' => 'marcel'],
            ['lastname' => 'Rousseau', 'firstname' => 'jean-jaques'],
            ['lastname' => 'Zola', 'firstname' => 'Emile'],
            ['lastname' => 'De Maupassant', 'firstname' => 'Guy'],
            ['lastname' => 'Tesson', 'firstname' => 'Sylvain'],
            ['lastname' => 'Duras', 'firstname' => 'Marguerite'],
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
