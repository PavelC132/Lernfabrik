<?php

namespace App\Entity;

use App\Repository\PlaetzeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaetzeRepository::class)]
class Plaetze
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ZuAbgaenge $ZuAbgaenge = null;

    #[ORM\Column]
    private ?int $Reihe = null;

    #[ORM\Column]
    private ?int $Spalte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZuAbgaenge(): ?ZuAbgaenge
    {
        return $this->ZuAbgaenge;
    }

    public function setZuAbgaenge(ZuAbgaenge $ZuAbgaenge): static
    {
        $this->ZuAbgaenge = $ZuAbgaenge;

        return $this;
    }

    public function getReihe(): ?int
    {
        return $this->Reihe;
    }

    public function setReihe(int $Reihe): static
    {
        $this->Reihe = $Reihe;

        return $this;
    }

    public function getSpalte(): ?int
    {
        return $this->Spalte;
    }

    public function setSpalte(int $Spalte): static
    {
        $this->Spalte = $Spalte;

        return $this;
    }
}
