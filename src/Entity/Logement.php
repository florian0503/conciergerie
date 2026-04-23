<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogementRepository::class)]
class Logement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 100)]
    private ?string $quartier = null;

    #[ORM\Column]
    private ?int $voyageurs = null;

    #[ORM\Column]
    private ?int $chambres = null;

    #[ORM\Column]
    private ?float $note = null;

    #[ORM\Column]
    private ?int $avis = null;

    #[ORM\Column]
    private ?int $occupation = null;

    #[ORM\Column(length: 20)]
    private ?string $revenus = null;

    #[ORM\Column]
    private ?int $imgIndex = null;

    #[ORM\Column(type: Types::JSON)]
    private array $photos = [];

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::JSON)]
    private array $equipements = [];

    #[ORM\Column(type: Types::JSON)]
    private array $pointsInteret = [];

    #[ORM\Column]
    private bool $publie = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(string $quartier): static
    {
        $this->quartier = $quartier;

        return $this;
    }

    public function getVoyageurs(): ?int
    {
        return $this->voyageurs;
    }

    public function setVoyageurs(int $voyageurs): static
    {
        $this->voyageurs = $voyageurs;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(int $chambres): static
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getAvis(): ?int
    {
        return $this->avis;
    }

    public function setAvis(int $avis): static
    {
        $this->avis = $avis;

        return $this;
    }

    public function getOccupation(): ?int
    {
        return $this->occupation;
    }

    public function setOccupation(int $occupation): static
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getRevenus(): ?string
    {
        return $this->revenus;
    }

    public function setRevenus(string $revenus): static
    {
        $this->revenus = $revenus;

        return $this;
    }

    public function getImgIndex(): ?int
    {
        return $this->imgIndex;
    }

    public function setImgIndex(int $imgIndex): static
    {
        $this->imgIndex = $imgIndex;

        return $this;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function setPhotos(array $photos): static
    {
        $this->photos = $photos;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEquipements(): array
    {
        return $this->equipements;
    }

    public function setEquipements(array $equipements): static
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getPointsInteret(): array
    {
        return $this->pointsInteret;
    }

    public function setPointsInteret(array $pointsInteret): static
    {
        $this->pointsInteret = $pointsInteret;

        return $this;
    }

    public function isPublie(): bool
    {
        return $this->publie;
    }

    public function setPublie(bool $publie): static
    {
        $this->publie = $publie;

        return $this;
    }

    public function getQuartierSlug(): string
    {
        $slug = mb_strtolower($this->quartier ?? '');
        $map = ['à' => 'a', 'â' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'î' => 'i', 'ô' => 'o', 'û' => 'u', 'ù' => 'u', 'ç' => 'c', '\'' => '', "\u{2019}" => '', ' ' => '-'];
        foreach ($map as $from => $to) {
            $slug = str_replace($from, $to, $slug);
        }

        return $slug;
    }

    public function __toString(): string
    {
        return $this->nom ?? '';
    }
}
