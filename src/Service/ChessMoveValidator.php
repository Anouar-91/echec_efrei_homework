<?php

namespace App\Service;

class ChessMoveValidator
{
    public function isMoveLegal(string $pieceType, string $from, string $to): bool
    {
        // Simplification: Validation pour un pion
        if ($pieceType === 'pawn') {
            // Cette logique suppose que les pions avancent d'une ligne vers le haut seulement
            $fromRow = $from[1];
            $toRow = $to[1];

            // Un pion peut avancer d'une case
            return ($toRow == $fromRow + 1);
        }

        // conditions pour d'autres types de pièces...

        return false;
    }
}