<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\SecteurActivite;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SecteurActiviteFixtures extends Fixture
{
        private $faker;
        
    
        public function __construct(){
            $this->faker=Factory::create("fr_FR");
          
     }
    

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<37;$i++){
            $secteurActivite = new secteurActivite(); 
            $secteurActivite->setintitule($this->faker->text());

            $this->addReference('secteurActivite'.$i, $secteurActivite);
            $manager->persist($secteurActivite);
        }    
    $manager->flush();
    }
}