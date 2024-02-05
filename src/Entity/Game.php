<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $currentTurn = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'blackPlayer')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $whitePlayer = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $blackPlayer = null;

    #[ORM\ManyToOne]
    private ?Player $winner = null;

    #[ORM\OneToMany(mappedBy: 'game', targetEntity: Move::class)]
    private Collection $moves;

    public function __construct()
    {
        $this->moves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCurrentTurn(): ?string
    {
        return $this->currentTurn;
    }

    public function setCurrentTurn(string $currentTurn): static
    {
        $this->currentTurn = $currentTurn;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getWhitePlayer(): ?Player
    {
        return $this->whitePlayer;
    }

    public function setWhitePlayer(?Player $whitePlayer): static
    {
        $this->whitePlayer = $whitePlayer;

        return $this;
    }

    public function getBlackPlayer(): ?Player
    {
        return $this->blackPlayer;
    }

    public function setBlackPlayer(?Player $blackPlayer): static
    {
        $this->blackPlayer = $blackPlayer;

        return $this;
    }

    public function getWinner(): ?Player
    {
        return $this->winner;
    }

    public function setWinner(?Player $winner): static
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * @return Collection<int, Move>
     */
    public function getMoves(): Collection
    {
        return $this->moves;
    }

    public function addMove(Move $move): static
    {
        if (!$this->moves->contains($move)) {
            $this->moves->add($move);
            $move->setGame($this);
        }

        return $this;
    }

    public function removeMove(Move $move): static
    {
        if ($this->moves->removeElement($move)) {
            // set the owning side to null (unless already changed)
            if ($move->getGame() === $this) {
                $move->setGame(null);
            }
        }

        return $this;
    }
}
