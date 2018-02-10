<?php

namespace EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UtilisateursBundle\Entity\Utilisateur;

class UtilisateurFixtures extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
{
    // Nécessaire pour encode le mdp
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setUsername($faker->userName);
            $utilisateur->setEmail($faker->email);
            $utilisateur->setEnabled(true);
            // On encode le password pour faire fonctionner les users
            $encoded = $this->container->get('security.password_encoder')->encodePassword($utilisateur, 'hello');
            $utilisateur->setPassword($encoded);
            $manager->persist($utilisateur);
            $manager->flush();
        }
    }

    // On définit l'ordre de création
    public function getOrder()
    {
        return 5;
    }
}