<?php

namespace App\Entity;

use App\Repository\ZuAbgaengeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZuAbgaengeRepository::class)]
class ZuAbgaenge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ZuAbgaenge')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AuftragsPosition $AuftragsPosition = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Material $Material = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Station $Station = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuftragsPosition(): ?AuftragsPosition
    {
        return $this->AuftragsPosition;
    }

    public function setAuftragsPosition(?AuftragsPosition $AuftragsPosition): static
    {
        $this->AuftragsPosition = $AuftragsPosition;

        return $this;
    }

    public function getMaterial(): ?Material
    {
        return $this->Material;
    }

    public function setMaterial(?Material $Material): static
    {
        $this->Material = $Material;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->Station;
    }

    public function setStation(?Station $Station): static
    {
        $this->Station = $Station;

        return $this;
    }
}
