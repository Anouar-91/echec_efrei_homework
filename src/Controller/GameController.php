<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Player;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game/start", name="game_start")
     */
    public function start(ManagerRegistry $em): Response
    {
        $game = new Game();
        
        // Pour l'exemple, nous allons créer deux joueurs fictifs
        $player1 = new Player();
        $player1->setName('Joueur 1');
        $em->getManager()->persist($player1);
        
        $player2 = new Player();
        $player2->setName('Joueur 2');
        $em->getManager()->persist($player2);
        
        $game->setWhitePlayer($player1);
        $game->setBlackPlayer($player2);
        $game->setStatus('en cours');
        $game->setCurrentTurn('blanc');
        $game->setCreatedAt(new \DateTime());
        
        $em->getManager()->persist($game);
        $em->getManager()->flush();
        
        // Retourne une réponse simple pour indiquer que la partie a été créée
        return new Response('Nouvelle partie d\'échecs démarrée avec succès !');
    }
}
