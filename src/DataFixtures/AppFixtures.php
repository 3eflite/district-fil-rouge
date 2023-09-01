<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Categorie

        $cat1 = new Categorie();
        $cat1->setLibelle('Pizza');
        $cat1->setActive(1);
        $cat1->setImage('pizza_cat.jpg');
        $manager->persist($cat1);

        $cat2 = new Categorie();
        $cat2->setLibelle('Pâtes');
        $cat2->setActive(1);
        $cat2->setImage('pasta_cat.jpg');
        $manager->persist($cat2);

        $cat3 = new Categorie();
        $cat3->setLibelle('Asian');
        $cat3->setActive(1);
        $cat3->setImage('asian_food_cat.jpg');
        $manager->persist($cat3);
        // Plat

                $plat1 = new Plat();
                $plat1->setLibelle('Yakitori');
                $plat1->setDescription('5 brochettes de poulet');
                $plat1->setPrix(3.99);
                $plat1->setImage('yakitori.jpg');
                $plat1->setActive(1);
                $plat1->setCategorie($cat3);
                $manager->persist($plat1);

                $plat2 = new Plat();
                $plat2->setLibelle('sushi');
                $plat2->setDescription('assortiments sushis saumon,thon');
                $plat2->setPrix(6.59);
                $plat2->setImage('sushi.jpeg');
                $plat2->setActive(1);
                $plat2->setCategorie($cat3);
                $manager->persist($plat2);

                $plat3 = new Plat();
                $plat3->setLibelle('Pizza salmon');
                $plat3->setDescription('Pizza base créme fraiche au saumon ');
                $plat3->setPrix(12);
                $plat3->setImage('pizza-salmon.png');
                $plat3->setActive(1);
                $plat3->setCategorie($cat1);
                $manager->persist($plat3);

                $plat4 = new Plat();
                $plat4->setLibelle('Spaghetti aux legumes');
                $plat4->setDescription('Pâtes fraiches aux légumes spécialement choisie par le chef');
                $plat4->setPrix(12.99);
                $plat4->setImage('spaghetti-legumes.jpg');
                $plat4->setActive(1);
                $plat4->setCategorie($cat2);
                $manager->persist($plat4);

                $plat5 = new Plat();
                $plat5->setLibelle('Raviolis truffé');
                $plat5->setDescription('raviolis aux truffes');
                $plat5->setPrix(39.99);
                $plat5->setImage('ravioli.jpeg');
                $plat5->setActive(1);
                $plat5->setCategorie($cat2);
                $manager->persist($plat5);
$manager->flush();
    }
}
