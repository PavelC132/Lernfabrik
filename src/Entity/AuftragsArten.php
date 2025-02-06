<?php

namespace App\Entity;

use App\Repository\AuftragsArtenRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuftragsArtenRepository::class)]
class AuftragsArten
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Bezeichnung = null;

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
}
