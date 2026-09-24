<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CountryFixtures extends Fixture
{
    public const USA_COUNTRY_REFERENCE = 'usa-country';
    public const FRANCE_COUNTRY_REFERENCE = 'france-country';

    public function load(ObjectManager $manager): void
    {
        $usa=new Country();
        $usa->setName('United States');
        $this->addReference(self::USA_COUNTRY_REFERENCE, $usa);
        $manager->persist($usa);

        $france=new Country();
        $france->setName('France');
        $this->addReference(self::FRANCE_COUNTRY_REFERENCE, $france);
        $manager->persist($france);

        $manager->flush();
    }
}
