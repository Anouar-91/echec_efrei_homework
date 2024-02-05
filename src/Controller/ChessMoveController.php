
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ChessMoveValidator;

class ChessMoveController extends AbstractController
{
    private $moveValidator;

    public function __construct(ChessMoveValidator $moveValidator)
    {
        $this->moveValidator = $moveValidator;
    }

    /**
     * @Route("/chess/move", name="chess_move", methods={"POST"})
     */
    public function move(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $pieceType = $data['pieceType'];
        $from = $data['from'];
        $to = $data['to'];

        if ($this->moveValidator->isMoveLegal($pieceType, $from, $to)) {
            // Logique pour effectuer le déplacement (à implémenter)
            return new Response('Déplacement effectué.');
        }

        return new Response('Déplacement illégal.', Response::HTTP_BAD_REQUEST);
    }
}