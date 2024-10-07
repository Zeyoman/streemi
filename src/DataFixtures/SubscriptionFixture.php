<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Subscription;

class SubscriptionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

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
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
