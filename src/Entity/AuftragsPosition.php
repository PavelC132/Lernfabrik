<?php

namespace App\Entity;

use App\Repository\AuftragsPositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuftragsPositionRepository::class)]
class AuftragsPosition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Auftrag $auftrag = null;

    /**
     * @var Collection<int, ZuAbgaenge>
     */
    #[ORM\OneToMany(targetEntity: ZuAbgaenge::class, mappedBy: 'AuftragsPosition')]
    private Collection $ZuAbgaenge;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Status = null;

    #{ORM\Column(type: Types::SMALLINT)]
    private ?int $Menge = null;

    public function __construct()
    {
        $this->ZuAbgaenge = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuftrag(): ?Auftrag
    {
        return $this->auftrag;
    }

    public function setAuftrag(?Auftrag $auftrag): static
    {
        $this->auftrag = $auftrag;

        return $this;
    }

    /**
     * @return Collection<int, ZuAbgaenge>
     */
    public function getZuAbgaenge(): Collection
    {
        return $this->ZuAbgaenge;
    }

    public function addZuAbgaenge(ZuAbgaenge $zuAbgaenge): static
    {
        if (!$this->ZuAbgaenge->contains($zuAbgaenge)) {
            $this->ZuAbgaenge->add($zuAbgaenge);
            $zuAbgaenge->setAuftragsPosition($this);
        }

        return $this;
    }

    public function removeZuAbgaenge(ZuAbgaenge $zuAbgaenge): static
    {
        if ($this->ZuAbgaenge->removeElement($zuAbgaenge)) {
            // set the owning side to null (unless already changed)
            if ($zuAbgaenge->getAuftragsPosition() === $this) {
                $zuAbgaenge->setAuftragsPosition(null);
            }
        }

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

    public function getMenge(): ?int
    {
        return $this->Menge;
    }

    public function setMenge(?int $Menge): void
    {
        $this->Menge = $Menge;
    }

}
