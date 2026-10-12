<?php

namespace App\DataFixtures;

use App\DataFixtures\CountryFixtures;
use App\Entity\Author;
use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture implements DependentFixtureInterface
{
    public const MELVILLE_AUTHOR_REFERENCE = 'melville-author';
    public const VICTOR_AUTHOR_REFERENCE = 'victor-author';

    public function load(ObjectManager $manager): void
    {
        $melville = new Author();
        $melville->setName('Herman Melville');
        $this->addReference(self::MELVILLE_AUTHOR_REFERENCE, $melville);
        $melville->setCountry($this->getReference(CountryFixtures::USA_COUNTRY_REFERENCE,Country::class));
        $manager->persist($melville);

        $victor = new Author();
        $victor->setName('Victor Hugo');
        $this->addReference(self::VICTOR_AUTHOR_REFERENCE, $victor);
        $victor->setCountry($this->getReference(CountryFixtures::FRANCE_COUNTRY_REFERENCE,Country::class));
        $manager->persist($victor);

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            CountryFixtures::class,
        ];
    }
}
