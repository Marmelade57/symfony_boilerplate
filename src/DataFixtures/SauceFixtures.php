<?php

namespace App\DataFixtures;

use App\Entity\Sauce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/sauce/create', name: 'sauce_create')]
class SauceFixtures extends Fixture
{
    private const REFERENCE = 'Sauce';
    public function load(ObjectManager $manager): void
    {
        $nomsSauces = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];
 
        foreach ($nomsSauces as $key => $nomSauce) {
            $sauce = new Sauce();
            $sauce->setName($nomSauce);
            $manager->persist($sauce);
            $this->addReference(self::REFERENCE . '_' . $key, $sauce);
        }
 
        $manager->flush();
    }

    public function create(EntityManagerInterface $manager): Response
    {
        $sauce = new Sauce();
        $sauce->setName('Bieber');

        $manager->persist($sauce);

        $manager->flush();

        return new Response('Sauce créé avec succès !');
    }
}
