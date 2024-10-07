<?php

namespace App\DataFixtures;

use App\Enum\MediaTypeEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Media;

class MediaFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $medias = [
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "11-10-2010", "type" => MediaTypeEnum::movie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "12-10-2010", "type" => MediaTypeEnum::movie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "13-10-2010", "type" => MediaTypeEnum::serie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "14-10-2010", "type" => MediaTypeEnum::movie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "15-10-2010", "type" => MediaTypeEnum::serie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
        ];

        foreach($medias as $media){
            $entity = new Media();
            $entity->setMediaType($media["type"]);
            $entity->setTitle($media["title"]);
            $entity->setShortDescription($media["shortDescription"]);
            $entity->setLongDescription($media["longDescription"]);
            $date = new \DateTime($media["releaseDate"]);
            $entity->setReleaseDate($date);
            $entity->setCoverImage($media["image"]);
            $entity->setStaff($media["staff"]);
            $entity->setCast($media["cast"]);
            $manager->persist($entity);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
