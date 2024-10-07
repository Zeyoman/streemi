<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Categorie;

use App\Enum\CommentStatusEnum;
use App\Entity\Comment;

use App\Entity\Language;

use App\Enum\MediaTypeEnum;
use App\Entity\Media;

use App\Entity\Subscription;

use App\Enum\UserStatusEnum;
use App\Entity\User;

class AppFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Categories
        $categories = [
            ["name" => "Action", "label" => "Action"],
            ["name" => "Science-Fiction", "label" => "Science-Fiction"],
            ["name" => "Romance", "label" => "Romance"],
            ["name" => "Suspense", "label" => "Suspense"],
            ["name" => "Horreur", "label" => "Horreur"],
        ];

        foreach($categories as $categorie){
            $entity = new Categorie();
            $entity->setName($categorie["name"]);
            $entity->setLabel($categorie["label"]);
            $manager->persist($entity);
        }

        // Comments
        $comments = [
            ["content" => "Lilian est trop beau", "status" => CommentStatusEnum::ACTIVE],
            ["content" => "Lilian est trop beau", "status" => CommentStatusEnum::WAITING],
            ["content" => "Lilian est trop beau", "status" => CommentStatusEnum::ACTIVE],
            ["content" => "Lilian est trop beau", "status" => CommentStatusEnum::REJECTED],
            ["content" => "Lilian est trop beau", "status" => CommentStatusEnum::REJECTED],
        ];

        foreach($comments as $comment){
            $entity = new Comment();
            $entity->setContent($comment["content"]);
            $entity->setStatus($comment["status"]);
            $manager->persist($entity);
        }

        // languages
        $languages = [
            ["name" => "French", "code" => "fr"],
            ["name" => "English", "code" => "en"],
            ["name" => "Spanish", "code" => "es"],
            ["name" => "German", "code" => "de"],
            ["name" => "Italian", "code" => "it"],
            ["name" => "Portuguese", "code" => "pt"],
            ["name" => "Dutch", "code" => "nl"],
            ["name" => "Russian", "code" => "ru"],
            ["name" => "Chinese", "code" => "zh"],
            ["name" => "Japanese", "code" => "ja"],
            ["name" => "Korean", "code" => "ko"],
            ["name" => "Arabic", "code" => "ar"],
            ["name" => "Turkish", "code" => "tr"],
            ["name" => "Hindi", "code" => "hi"],
            ["name" => "Bengali", "code" => "bn"],
            ["name" => "Urdu", "code" => "ur"],
            ["name" => "Vietnamese", "code" => "vi"],
            ["name" => "Thai", "code" => "th"],
            ["name" => "Swedish", "code" => "sv"],
            ["name" => "Danish", "code" => "da"],
            ["name" => "Finnish", "code" => "fi"],
            ["name" => "Norwegian", "code" => "no"],
            ["name" => "Polish", "code" => "pl"],
            ["name" => "Greek", "code" => "el"],
            ["name" => "Czech", "code" => "cs"],
            ["name" => "Slovak", "code" => "sk"],
            ["name" => "Romanian", "code" => "ro"],
            ["name" => "Hungarian", "code" => "hu"],
            ["name" => "Bulgarian", "code" => "bg"],
            ["name" => "Serbian", "code" => "sr"],
            ["name" => "Croatian", "code" => "hr"],
            ["name" => "Bosnian", "code" => "bs"],
            ["name" => "Albanian", "code" => "sq"],
            ["name" => "Macedonian", "code" => "mk"],
            ["name" => "Slovenian", "code" => "sl"],
            ["name" => "Estonian", "code" => "et"]
        ];

        foreach($languages as $language){
            $entity = new Language();
            $entity->setName($language["name"]);
            $entity->setCode($language["code"]);
            $manager->persist($entity);
        }

        // media
        $medias = [
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "11-10-2010", "type" => MediaTypeEnum::movie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "12-10-2010", "type" => MediaTypeEnum::movie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "13-10-2010", "type" => MediaTypeEnum::serie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "14-10-2010", "type" => MediaTypeEnum::movie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
            ["title" => "Lilian est trop beau","shortDescription" => "Woaw il faut le voir pour le croire","longDescription" => "lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum bla bla bla bla bla","releaseDate" => "15-10-2010", "type" => MediaTypeEnum::serie, "image" => "image.png","staff" => ["Alexandre"], "cast" => ["Lilian"]],
        ];

        foreach($medias as $media){
            // media
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
            // $entity->addMediaLanguage($language);
        }


        // subscription
        $subscriptions = [
            ["name" => "Trop bien", "price" => 5, "duration" => 1],
            ["name" => "Bien", "price" => 5, "duration" => 1],
            ["name" => "Ok", "price" => 5, "duration" => 1],
            ["name" => "Nul", "price" => 5, "duration" => 1],
            ["name" => "Trop nul", "price" => 5, "duration" => 1],
        ];

        foreach($subscriptions as $subscription){
            $entity = new Subscription();
            $entity->setName($subscription["name"]);
            $entity->setPrice($subscription["price"]);
            $entity->setDurationInMonth($subscription["duration"]);
            $manager->persist($entity);
        }

        // users
        $users = [
            ["username" => "Fayzer", "status" => UserStatusEnum::ACTIVE, "email" => "fayzer@gmail.com", "password" => "printemps"],
            ["username" => "FayzerTest", "status" => UserStatusEnum::INACTIVE, "email" => "fayzerTest@gmail.com", "password" => "printemps"],
            ["username" => "FayzerProd", "status" => UserStatusEnum::DELETED, "email" => "FayzerProd@gmail.com", "password" => "printemps"],
            ["username" => "FayzerDev", "status" => UserStatusEnum::PENDING, "email" => "FayzerDev@gmail.com", "password" => "printemps"],
            ["username" => "FayzerHack", "status" => UserStatusEnum::SUSPENDED, "email" => "FayzerHack@gmail.com", "password" => "printemps"],
            ["username" => "FayzerNoob", "status" => UserStatusEnum::BANNED, "email" => "FayzerNoob@gmail.com", "password" => "printemps"],
        ];

        foreach($users as $user){
            $entity = new User();
            $entity->setUsername($user["username"]);
            $entity->setAccountStatus($user["status"]);
            $entity->setEmail($user["email"]);
            $entity->setPassword($user["password"]);
            $manager->persist($entity);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
