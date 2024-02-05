<?php

namespace App\Entity;

use App\Repository\MoveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoveRepository::class)]
class Move
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'moves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $game = null;

    #[ORM\ManyToOne(inversedBy: 'moves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Piece $piece = null;

    #[ORM\Column(length: 255)]
    private ?string $fromPosition = null;

    #[ORM\Column(length: 255)]
    private ?string $toPosition = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getPiece(): ?Piece
    {
        return $this->piece;
    }

    public function setPiece(?Piece $piece): static
    {
        $this->piece = $piece;

        return $this;
    }

    public function getFromPosition(): ?string
    {
        return $this->fromPosition;
    }

    public function setFromPosition(string $fromPosition): static
    {
        $this->fromPosition = $fromPosition;

        return $this;
    }

    public function getToPosition(): ?string
    {
        return $this->toPosition;
    }

    public function setToPosition(string $toPosition): static
    {
        $this->toPosition = $toPosition;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
