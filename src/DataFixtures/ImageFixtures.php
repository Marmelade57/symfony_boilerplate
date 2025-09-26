<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/image/create', name: 'image_create')]
class ImageFixtures extends Fixture
{
    private const REFERENCE = 'Image';
    public function load(ObjectManager $manager): void
    {
        $nomsImages = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];
 
        foreach ($nomsImages as $key => $nomImage) {
            $image = new Image();
            $image->setName($nomImage);
            $manager->persist($image);
            $this->addReference(self::REFERENCE . '_' . $key, $image);
        }
 
        $manager->flush();
    }

    public function create(EntityManagerInterface $manager): Response
    {
        $image = new Image();
        $image->setName('Bieber');

        $manager->persist($image);

        $manager->flush();

        return new Response('Image créé avec succès !');
    }
}
