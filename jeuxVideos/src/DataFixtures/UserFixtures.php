<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName("Reporter")
        	->setFirstname("Albert")
        	->setRole(0)
        	->setMailAdress("didichandidoui@gmail.com")
        	->setPassword("dsfjkl")
        	->setPseudo("Flantier")
        	->setBirthday(new \DateTime("now"))
        	->setSex(0);

        $manager->persist($user);
        $manager->flush();
    }
}
