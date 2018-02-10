<?php

namespace EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EcommerceBundle\Entity\Tva;

class TvaFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tva = new Tva();
        $tva->setNom('TVA 20%');
        // On utilise une réference de Média dans MediaFixtures.php (add reference)
        $tva->setMultiplicate(0.833);
        $tva->setValeur(20);
        $manager->persist($tva);
        $manager->flush();

        // Permet d'utiliser dans une autre fixture
        $this->addReference('tva1', $tva);
    }

    // On définit l'ordre de création
    public function getOrder()
    {
        return 3;
    }
}