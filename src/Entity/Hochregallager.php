<?php

namespace App\Entity;

use App\Repository\HochregallagerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HochregallagerRepository::class)]
class Hochregallager
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Material $material = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $spalte = null;

    #[ORM\Column]
    private ?bool $oben = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): static
    {
        $this->material = $material;

        return $this;
    }

    public function getSpalte(): ?int
    {
        return $this->spalte;
    }

    public function setSpalte(int $spalte): static
    {
        $this->spalte = $spalte;

        return $this;
    }

    public function isOben(): ?bool
    {
        return $this->oben;
    }

    public function setOben(bool $oben): static
    {
        $this->oben = $oben;

        return $this;
    }
}
