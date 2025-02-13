<?php

namespace App\Handler;

use App\Entity\Auftraggeber;
use App\Entity\AuftragsArten;
use App\Repository\AuftraggeberRepository;
use App\Service\Auftrag;
use Doctrine\ORM\EntityManagerInterface;

class AuftraggeberHandler
{
    private EntityManagerInterface $entityManager;
    private AuftraggeberRepository $auftraggeberRepository;

    public function __construct(EntityManagerInterface $entityManager, AuftraggeberRepository $auftraggeberRepository)
    {
        $this->entityManager = $entityManager;
        $this->auftraggeberRepository = $auftraggeberRepository;
    }

    public function loadAll(): array
    {
        return $this->auftraggeberRepository->findAll();
    }

    public function load(int $id): ?Auftraggeber
    {
        return $this->auftraggeberRepository->find($id);
    }

    public function create(Auftraggeber $auftraggeber): void
    {
        $this->entityManager->persist($auftraggeber);
        $this->entityManager->flush();
    }

    public function update(Auftraggeber $auftraggeber): void
    {
        $this->entityManager->flush();
    }

    public function delete(Auftraggeber $auftraggeber): void
    {
        $this->entityManager->remove($auftraggeber);
        $this->entityManager->flush();
    }

    public function findByName(string $name): array
    {
        return $this->auftraggeberRepository->findBy(['Name' => $name]);
    }

    public function findByAuftragsArt(AuftragsArten $auftragsArt): array
    {
        return $this->auftraggeberRepository->findBy(['AuftragsArten' => $auftragsArt]);
    }

    public function getAuftraege(Auftraggeber $auftraggeber): array
    {
        return $auftraggeber->getAuftraege()->toArray();
    }

    public function addAuftrag(Auftraggeber $auftraggeber, Auftrag $auftrag): void
    {
        $auftraggeber->addAuftraege($auftrag);
        $this->entityManager->flush();
    }

    public function removeAuftrag(Auftraggeber $auftraggeber, Auftrag $auftrag): void
    {
        $auftraggeber->removeAuftraege($auftrag);
        $this->entityManager->flush();
    }
}