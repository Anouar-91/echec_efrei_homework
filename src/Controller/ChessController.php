<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChessController extends AbstractController
{
    /**
     * @Route("/chess/board", name="chess_board")
     */
    public function showBoard(): Response
    {
        // Logique pour récupérer l'état actuel de l'échiquier, si nécessaire
        
        // Pour cet exemple, on retourne une réponse simple
        return new Response('Affichage de l\'échiquier');
    }
}
