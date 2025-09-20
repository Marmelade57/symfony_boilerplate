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
        $listeBurgeurs = [
            ["Bieber", "Steak haché maison,cheddar, ketchup et mayonnaise", 6], 
            ["Ray Charles", "Steak haché maison, cheddar, salade, tomate, cornichons, ketchup, mayonnaise", 7.9], 
            ["Céline Dion", "Steak haché maison, cheddar, emmental, oignons rouges pickles, cornichons, ketchup, moutarde", 7.9], 
            ["James Brown", "Steak haché maison, cheddar, bacon, oignons grillés, onion ring, barbecue et mayonnaise", 8.9], 
            ["Daft Punk", "Steak haché maison, cheddar, emmental, bacon, oignons grillés, sauce ancienne", 8.9], 
            ["Johnny Cach", "Steak haché maison, cheddar, emmental, grana padano AOP, bacon, oignons grillés, cornichons, ketchup et poivre", 9.5], 
            ["Chuck Berry", "Steak haché maison, chèvre, galette de pomme de terre, bacon, oignons grillés, roquette, sauces miel et poivre", 9.5], ["Metallica", "Steak haché maison, double raclette, bacon, oignons frits, cornichons, salade, sauces truffe et barbecue", 10], 
            ["Dystinct", "Steak haché maison, raclette, bacon, galette, oignons rouges pickles, sauces barbecue et moutarde", 8.9], 
            ["Hi-Gloss", "Steak haché maison, mozzarella snackée, cheddar, chorizo, sauce poivre", 9.5], 
            ["Tif", "Escalope de poulet, cheddar, raclette, galette de pomme de terre, oignons frits, bacon, sauce aïoli",  9.5], 
            ["Nina Simone", "Escalope de poulet épices cajun, cheddar, grana padano AOP, salade, tomate, oignons frits, chorizo, mayonnaise", 10], 
            ["L.T.D.", "Double galette de pomme de terre, fourme d’Ambert AOP, raclette, bacon, oignons rouges pickles, sauce ancienne", 7.9], 
            ["Manu Dibango", "Mozzarella snackée, épices cajun, cheddar, oignons frits, salade, tomate, sauce miel", 8.9], 
            ["Fred again...", "Steak végétal, fourme d’Ambert AOP, oignons rouges pickles, roquette, tomate, sauce truffe", 10], 
            ["Boo-it Yourself", "Burger à personnaliser", 10]
        ];

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
                "ingredients" => $listeBurgeurs[$id][1],
                "prix" => $listeBurgeurs[$id][2]
            ]);
        }
    }
}
