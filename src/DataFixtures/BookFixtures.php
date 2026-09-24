<?php

namespace App\DataFixtures;

use App\DataFixtures\AuthorFixtures;
use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        // Création d'un livre
        $book = new Book();
        $book->setTitle('Moby Dick');
        $book->addAuthor($this->getReference(AuthorFixtures::MELVILLE_AUTHOR_REFERENCE,Author::class));
        $manager->persist($book);

        $book2 = new Book();
        $book2->setTitle('Les Misérables');
        $book2->addAuthor($this->getReference(AuthorFixtures::VICTOR_AUTHOR_REFERENCE,Author::class));
        $manager->persist($book2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AuthorFixtures::class,
        ];
    }
}
