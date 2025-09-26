<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/commentaire/create', name: 'commentaire_create')]
class CommentaireFixtures extends Fixture
{
    private const REFERENCE = 'Commentaire';
    public function load(ObjectManager $manager): void
    {
        $nomsCommentaires = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];
 
        foreach ($nomsCommentaires as $key => $nomCommentaire) {
            $commentaire = new Commentaire();
            $commentaire->setName($nomCommentaire);
            $manager->persist($commentaire);
            $this->addReference(self::REFERENCE . '_' . $key, $commentaire);
        }
 
        $manager->flush();
    }

    public function create(EntityManagerInterface $manager): Response
    {
        $commentaire = new Commentaire();
        $commentaire->setName('Bieber');

        $manager->persist($commentaire);

        $manager->flush();

        return new Response('Commentaire créé avec succès !');
    }
}
