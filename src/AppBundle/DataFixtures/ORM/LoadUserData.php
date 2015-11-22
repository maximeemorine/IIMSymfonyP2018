<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@admin.fr');
        $user->setFirstname('Admin');
        $user->setLastname('Admin');
        $user->setIsActive(1);
        $user->setPassword('$2y$13$zFJM96ngzBH4pKXGiOFFy.8iQVUZmKMHvXmXedEHp4VHtR8cjSg3y');

        $manager->persist($user);
        $manager->flush();
    }
}
