<?php

namespace App\Entity;

use App\Repository\MateriallagerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MateriallagerRepository::class)]
class Materiallager
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Material $saeule1 = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Material $saeule2 = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Material $saeule3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaeule1(): ?Material
    {
        return $this->saeule1;
    }

    public function setSaeule1(?Material $saeule1): static
    {
        $this->saeule1 = $saeule1;

        return $this;
    }

    public function getSaeule2(): ?Material
    {
        return $this->saeule2;
    }

    public function setSaeule2(?Material $saeule2): static
    {
        $this->saeule2 = $saeule2;

        return $this;
    }

    public function getSaeule3(): ?Material
    {
        return $this->saeule3;
    }

    public function setSaeule3(?Material $saeule3): static
    {
        $this->saeule3 = $saeule3;

        return $this;
    }
}
