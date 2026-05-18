<?php

namespace App\Entity;

use App\Repository\AvisStatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisStatsRepository::class)]
class AvisStats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private float $note = 4.94;

    #[ORM\Column]
    private int $proprietairesSatisfaits = 98;

    #[ORM\Column]
    private int $avisTotal = 340;

    #[ORM\Column]
    private int $recommandent = 93;

    public function getId(): ?int { return $this->id; }

    public function getNote(): float { return $this->note; }
    public function setNote(float $note): static { $this->note = $note; return $this; }

    public function getProprietairesSatisfaits(): int { return $this->proprietairesSatisfaits; }
    public function setProprietairesSatisfaits(int $v): static { $this->proprietairesSatisfaits = $v; return $this; }

    public function getAvisTotal(): int { return $this->avisTotal; }
    public function setAvisTotal(int $v): static { $this->avisTotal = $v; return $this; }

    public function getRecommandent(): int { return $this->recommandent; }
    public function setRecommandent(int $v): static { $this->recommandent = $v; return $this; }

    public function __toString(): string { return 'Statistiques avis'; }
}
