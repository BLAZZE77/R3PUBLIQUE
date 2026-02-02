<?php

namespace App\Entity;

use App\Repository\PoliticienRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoliticienRepository::class)]
class Politicien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $parti = null;

    #[ORM\Column(length: 255)]
    private ?string $fonction = null;

    #[ORM\Column(length: 50)]
    private ?string $bord = null;

    #[ORM\Column]
    private ?int $anneeDebut = null;

    #[ORM\Column(length: 1)]
    private ?string $genre = null;

    #[ORM\Column(length: 10)]
    private ?string $republique = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;
        return $this;
    }

    public function getParti(): ?string
    {
        return $this->parti;
    }

    public function setParti(string $parti): static
    {
        $this->parti = $parti;
        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): static
    {
        $this->fonction = $fonction;
        return $this;
    }

    public function getBord(): ?string
    {
        return $this->bord;
    }

    public function setBord(string $bord): static
    {
        $this->bord = $bord;
        return $this;
    }

    public function getAnneeDebut(): ?int
    {
        return $this->anneeDebut;
    }

    public function setAnneeDebut(int $anneeDebut): static
    {
        $this->anneeDebut = $anneeDebut;
        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;
        return $this;
    }

    public function getRepublique(): ?string
    {
        return $this->republique;
    }

    public function setRepublique(string $republique): static
    {
        $this->republique = $republique;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'photo' => $this->photo,
            'parti' => $this->parti,
            'fonction' => $this->fonction,
            'bord' => $this->bord,
            'anneeDebut' => $this->anneeDebut,
            'genre' => $this->genre,
            'republique' => $this->republique,
        ];
    }
}
