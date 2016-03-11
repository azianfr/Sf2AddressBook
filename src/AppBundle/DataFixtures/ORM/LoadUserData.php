<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;
use Faker;

class LoadUserData implements FixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {

        for ($i = 1; $i <= 50; $i++) {
            $faker = Faker\Factory::create('fr_FR');
            $userManager = $this->container->get('fos_user.user_manager');

            $user = $userManager->createUser();
            $user->setUsername($faker->username);
            $user->setPlainPassword("test");
            $user->setEmail($faker->email);
            $user->setEnabled(true);
            $user->setPhone($faker->phoneNumber());
            $user->setWebsite($faker->url);
            $user->setAddress($faker->streetAddress());

            $manager->persist($user);
            $manager->flush();
            echo "Nombre d'utilisateurs générés : " . $i . "\n";
        }
    }

}
