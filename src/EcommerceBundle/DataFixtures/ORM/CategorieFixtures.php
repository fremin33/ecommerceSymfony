<?php

namespace EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EcommerceBundle\Entity\Categorie;
use EcommerceBundle\Entity\Media;
use Faker;

class CategorieFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i < 5 ; $i++) {
            // On récupère tous les médias
            $media = $manager->getRepository(Media::class)->findAll();
            // On affecte les 5 premiers
            $media = $media[$i];
            $categorie = new Categorie();
            $categorie->setNom($faker->name());
            $categorie->setImage($media);
            $manager->persist($categorie);
            $manager->flush();
        }
    }

    // On définit l'ordre de création
    public function getOrder()
    {
        return 2;
    }
}