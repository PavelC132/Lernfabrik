<?php

namespace App\Entity;

use App\Repository\AuftragRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuftragRepository::class)]
class Auftrag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'auftraege')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Auftraggeber $auftraggeber = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Datum = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuftraggeber(): ?Auftraggeber
    {
        return $this->auftraggeber;
    }

    public function setAuftraggeber(?Auftraggeber $auftraggeber): static
    {
        $this->auftraggeber = $auftraggeber;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->Datum;
    }

    public function setDatum(\DateTimeInterface $Datum): static
    {
        $this->Datum = $Datum;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(int $Status): static
    {
        $this->Status = $Status;

        return $this;
    }
}
