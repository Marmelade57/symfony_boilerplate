<?php

namespace App\DataFixtures;

use App\Entity\Pain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/pain/create', name: 'pain_create')]
class PainFixtures extends Fixture
{
    private const REFERENCE = 'Pain';
    public function load(ObjectManager $manager): void
    {
        $nomsPains = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];
 
        foreach ($nomsPains as $key => $nomPain) {
            $pain = new Pain();
            $pain->setName($nomPain);
            $manager->persist($pain);
            $this->addReference(self::REFERENCE . '_' . $key, $pain);
        }
 
        $manager->flush();
    }

    public function create(EntityManagerInterface $manager): Response
    {
        $pain = new Pain();
        $pain->setName('Bieber');

        $manager->persist($pain);

        $manager->flush();

        return new Response('Pain créé avec succès !');
    }
}
