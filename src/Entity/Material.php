<?php

namespace App\Entity;

use App\Repository\MaterialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterialRepository::class)]
class Material
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Bezeichnung = null;

    #[ORM\Column]
    private ?int $StanzAnzahl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBezeichnung(): ?string
    {
        return $this->Bezeichnung;
    }

    public function setBezeichnung(string $Bezeichnung): static
    {
        $this->Bezeichnung = $Bezeichnung;

        return $this;
    }

    public function getStanzAnzahl(): ?int
    {
        return $this->StanzAnzahl;
    }

    public function setStanzAnzahl(int $StanzAnzahl): static
    {
        $this->StanzAnzahl = $StanzAnzahl;

        return $this;
    }
}
