<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Client;
use App\Entity\SecteurActivite;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClientFixtures extends Fixture 
{
    private $faker;
    

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
       
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $Client = new Client();
            $Client->setNom($this->faker->lastName())
            ->setPrenom($this->faker->firstName())
            ->setrue($this->faker->text());
            $Client->setville($this->faker->text());
            $Client->setcodepostal($this->faker->numberBetween());
            $Client->setsecteur($this->getReference('SecteurActivite'.mt_rand(0,9)));
            $Client->persist($Client);
            $this->addReference('Client'.$i, $Client);
        }

        $manager->flush();
    }

}