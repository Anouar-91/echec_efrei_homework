<?php

namespace App\Entity;

use App\Repository\PieceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: PieceRepository::class)]
class Piece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\Column]
    private ?bool $isCaptured = null;

    #[ORM\Column]
    private ?int $moveCount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function isIsCaptured(): ?bool
    {
        return $this->isCaptured;
    }

    public function setIsCaptured(bool $isCaptured): static
    {
        $this->isCaptured = $isCaptured;

        return $this;
    }

    public function getMoveCount(): ?int
    {
        return $this->moveCount;
    }

    public function setMoveCount(int $moveCount): static
    {
        $this->moveCount = $moveCount;

        return $this;
    }
}
