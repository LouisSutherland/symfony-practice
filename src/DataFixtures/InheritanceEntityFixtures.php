<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Author;
use App\Entity\Pdf;
use App\Entity\Video;

class InheritanceEntityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 2; $i++){
            $author = new Author();
            $author->setName('Author name: ' . $i);
            $manager->persist($author);

            for($j = 1; $j <= 3; $j++){
                $pdf = (new Pdf())
                    ->setFilename('pdf name of the user ' .  $i)
                    ->setDescription('pdf description of user ' . $i)
                    ->setSize(5454)
                    ->setOrientation('portrait')
                    ->setPagesNumber(123)
                    ->setAuthor($author);
                $manager->persist($pdf);
            }

            for($k = 1; $k <= 3; $k++){
                $video = (new Video())
                    ->setFilename('video name of the user ' . $i)
                    ->setDescription('video description of the user ' . $i)
                    ->setSize(23242)
                    ->setFormat('mpeg-2')
                    ->setDuration(123)
                    ->setAuthor($author);
                $manager->persist($video);
            }
        }

        $manager->flush();
    }
}
