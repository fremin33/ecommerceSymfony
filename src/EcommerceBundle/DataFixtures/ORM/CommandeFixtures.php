<?php

namespace EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EcommerceBundle\Entity\Commande;
use EcommerceBundle\Entity\Produit;
use Faker;
use UtilisateursBundle\Entity\Utilisateur;

class CommandeFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i < 5 ; $i++) {
            // On récupère la liste des utilisateurs
            $utilisateur = $manager->getRepository(Utilisateur::class)->findAll();
            // On en sélectionne un utilisateur au hazard
            $utilisateur = $utilisateur[array_rand($utilisateur)];

            // On récupère la liste des produits
            $produits = $manager->getRepository(Produit::class)->findAll();
            // On en sélectionne un au hazard

            $produit1 = $produits[array_rand($produits)];
            $produit2 = $produits[array_rand($produits)];
            $produit3 = $produits[array_rand($produits)];


            $commande = new Commande();
            $commande->setUtilisateur($utilisateur);
            $commande->setValide(true);
            $commande->setDate(new \DateTime());
            $commande->setReference($faker->randomNumber);
            $commande->setProduits(
                [
                    '0' => [ $produit1, 2],
                    '1' => [ $produit2, 2],
                    '2' => [ $produit3, 3]
                ]
            );
            $manager->persist($commande);
            $manager->flush();
        }
    }

    // On définit l'ordre de création
    public function getOrder()
    {
        return 7;
    }
}