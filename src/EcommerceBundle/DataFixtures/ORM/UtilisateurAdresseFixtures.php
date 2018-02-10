<?php

namespace EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EcommerceBundle\Entity\UtilisateurAdresse;
use Faker;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UtilisateursBundle\Entity\Utilisateur;

class UtilisateurAdresseFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++) {
            $utilisateurAdresse = new UtilisateurAdresse();

            // On récupère la liste des utilisateurs
            $utilisateur = $manager->getRepository(Utilisateur::class)->findAll();
            // On en sélectionne un au hazard
            $utilisateur = $utilisateur[array_rand($utilisateur)];
            $utilisateurAdresse->setUtilisateur($utilisateur);
            $utilisateurAdresse->setNom($faker->name);
            $utilisateurAdresse->setPrenom($faker->firstName);
            $utilisateurAdresse->setTelephone($faker->phoneNumber);
            $utilisateurAdresse->setAdresse($faker->address);
            $utilisateurAdresse->setCp($faker->postcode);
            $utilisateurAdresse->setVille($faker->city);
            $utilisateurAdresse->setPays($faker->country);
            $utilisateurAdresse->setComplement($faker->companySuffix);
            $manager->persist($utilisateurAdresse);
            $manager->flush();
        }
    }

    // On définit l'ordre de création
    public function getOrder()
    {
        return 6;
    }
}