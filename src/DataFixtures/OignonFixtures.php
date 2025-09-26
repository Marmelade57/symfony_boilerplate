<?php

namespace App\DataFixtures;

use App\Entity\Oignon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/oignon/create', name: 'oignon_create')]
class OignonFixtures extends Fixture
{
    private const REFERENCE = 'Oignon';
    public function load(ObjectManager $manager): void
    {
        $nomsOignons = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];
 
        foreach ($nomsOignons as $key => $nomOignon) {
            $oignon = new Oignon();
            $oignon->setName($nomOignon);
            $manager->persist($oignon);
            $this->addReference(self::REFERENCE . '_' . $key, $oignon);
        }
 
        $manager->flush();
    }

    public function create(EntityManagerInterface $manager): Response
    {
        $oignon = new Oignon();
        $oignon->setName('Bieber');

        $manager->persist($oignon);

        $manager->flush();

        return new Response('Oignon créé avec succès !');
    }
}
