<?php

namespace App\Controller;

use ErrorException;
use LengthException;
use OutOfRangeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'burgers')]
    public function list(): Response
    {

        return $this->render('burgers_list.html.twig', []);
    }

    #[Route('/burgers/{id}', name: 'un_burger')]
    public function show(Int $id)
    {
        $listeBurgeurs = [["Bieber", 6], ["Ray Charles", 7.9], ["Céline Dion", 7.9], ["James Brown", 8.9], ["Daft Punk", 8.9], ["Johnny Cach", 9.5], ["Chuck Berry", 9.5], ["Metallica", 10], ["Dystinct", 8.9], ["Hi-Gloss", 9.5], ["Tif", 9.5], ["Nina Simone", 10], ["L.T.D.", 7.9], ["Manu Dibango", 8.9], ["Fred again...", 10], ["Boo-it Yourself", 10]];

        if (!isset($id)) {
            return $this->render('burger_show.html.twig', [
                "erreur" => "Aucun burger n'a été sélectionné.",
                "nom" => "Erreur"
            ]);
        } else if ($id >= count($listeBurgeurs)) {
            return $this->render('burger_show.html.twig', [
                "erreur" => "Le burger sélectionné n'existe pas.",
                "nom" => "Erreur"
            ]);
        } else {
            return $this->render('burger_show.html.twig', [
                "id" => $id,
                "nom" => $listeBurgeurs[$id][0],
                "prix" => $listeBurgeurs[$id][1]
            ]);
        }
    }
}
