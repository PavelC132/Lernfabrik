<?php

namespace App\Service;

use App\Entity\Auftrag;
use App\Repository\AuftragRepository;
use Doctrine\ORM\EntityManagerInterface;

class AuftragService
{
    private EntityManagerInterface $entityManager;
    private AuftragRepository $auftragRepository;

    public function __construct(EntityManagerInterface $entityManager, AuftragRepository $auftragRepository)
    {
        $this->entityManager = $entityManager;
        $this->auftragRepository = $auftragRepository;
    }

    public function loadAll(): array
    {
        return $this->auftragRepository->findAll();
    }

    public function load(int $id): ?Auftrag
    {
        return $this->auftragRepository->find($id);
    }

    public function create(Auftrag $auftrag): void
    {
        $this->entityManager->persist($auftrag);
        $this->entityManager->flush();
    }

    public function update(Auftrag $auftrag): void
    {
        $this->entityManager->flush();
    }

    public function delete(Auftrag $auftrag): void
    {
        $this->entityManager->remove($auftrag);
        $this->entityManager->flush();
    }

    public function findByStatus(int $status): array
    {
        return $this->auftragRepository->findBy(['Status' => $status]);
    }

    public function findByAuftraggeber(Auftraggeber $auftraggeber): array
    {
        return $this->auftragRepository->findBy(['auftraggeber' => $auftraggeber]);
    }
}