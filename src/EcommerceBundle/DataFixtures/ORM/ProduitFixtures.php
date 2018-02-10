<?php

namespace EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EcommerceBundle\Entity\Categorie;
use EcommerceBundle\Entity\Media;
use EcommerceBundle\Entity\Produit;
use Faker;

class ProduitFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $compteur = 6;
        for ($i = 0; $i < 35; $i++) {
            // On récupère tous les médias
            $media = $manager->getRepository(Media::class)->findAll();
            // A partir de 6 car les 5 premiers sont utilisé pour les categories
            $media = $media[$compteur];
            $compteur++;

            // On récupère toutes les categories
            $categorie = $manager->getRepository(Categorie::class)->findAll();
            // On sélectionne une categorie au hazard
            $categorie = $categorie[array_rand($categorie)];

            $produit = new Produit();
            $produit->setNom($faker->lastName);
            $produit->setPrix($faker->randomNumber(2));
            $produit->setDisponible(true);
            $produit->setImage($media);
            // On récupère la Référence définit dans Tva fixtures
            $produit->setTva($this->getReference('tva1'));
            $produit->setDescription($faker->text($maxNbChars = 200));
            $produit->setCategorie($categorie);
            $manager->persist($produit);
            $manager->flush();
        }

    }

    // On définit l'ordre de création
    public function getOrder()
    {
        return 4;
    }
}