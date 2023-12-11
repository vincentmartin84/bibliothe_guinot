<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User; 

use Faker; 
use Faker\Factory;



class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        // $product = new Product();
        // $manager->persist($product);
        for($i=0; $i<=100; $i++) {
            $user= new User();
            $user->setLastname($faker->lastName())
                ->setFirstname($faker->firstName())
                ->setEmail($faker->eMail())
                ->setPassword($faker->passWord()); 
            $manager->persist($user);

        }

        $manager->flush();
    }
}
