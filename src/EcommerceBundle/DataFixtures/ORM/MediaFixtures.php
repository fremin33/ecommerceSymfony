<?php
namespace EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EcommerceBundle\Entity\Media;
use Faker;

class MediaFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');
        for ($i=0; $i < 50; $i++) {
            $media = new Media();
            $media->setAlt($faker->firstNameMale);
            $media->setPath($faker->imageUrl($width = 640, $height = 480));
            $manager->persist($media);
            $manager->flush();
        }


    }

    // On définit l'ordre de création
    public function getOrder()
    {
        return 1;
    }
}