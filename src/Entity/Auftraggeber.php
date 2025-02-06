<?php

namespace App\Entity;

use App\Repository\AuftraggeberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuftraggeberRepository::class)]
class Auftraggeber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?AuftragsArten $AuftragsArten = null;

    /**
     * @var Collection<int, Auftrag>
     */
    #[ORM\OneToMany(targetEntity: Auftrag::class, mappedBy: 'auftraggeber')]
    private Collection $auftraege;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    public function __construct()
    {
        $this->auftraege = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuftragsArten(): ?AuftragsArten
    {
        return $this->AuftragsArten;
    }

    public function setAuftragsArten(?AuftragsArten $AuftragsArten): static
    {
        $this->AuftragsArten = $AuftragsArten;

        return $this;
    }

    /**
     * @return Collection<int, Auftrag>
     */
    public function getAuftraege(): Collection
    {
        return $this->auftraege;
    }

    public function addAuftraege(Auftrag $auftraege): static
    {
        if (!$this->auftraege->contains($auftraege)) {
            $this->auftraege->add($auftraege);
            $auftraege->setAuftraggeber($this);
        }

        return $this;
    }

    public function removeAuftraege(Auftrag $auftraege): static
    {
        if ($this->auftraege->removeElement($auftraege)) {
            // set the owning side to null (unless already changed)
            if ($auftraege->getAuftraggeber() === $this) {
                $auftraege->setAuftraggeber(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }
}
