<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/burger/create', name: 'burger_create')]
class BurgerFixtures extends Fixture
{
    private const REFERENCE = 'Burger';
    public function load(ObjectManager $manager): void
    {
        $nomsBurgers = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];
 
        foreach ($nomsBurgers as $key => $nomBurger) {
            $burger = new Burger();
            $burger->setName($nomBurger);
            $manager->persist($burger);
            $this->addReference(self::REFERENCE . '_' . $key, $burger);
        }
 
        $manager->flush();
    }

    public function create(EntityManagerInterface $manager): Response
    {
        $burger = new Burger();
        $burger->setName('Bieber');

        $manager->persist($burger);

        $manager->flush();

        return new Response('Burger créé avec succès !');
    }
}
