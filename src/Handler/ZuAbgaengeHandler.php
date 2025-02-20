<?php

namespace App\Handler;

use App\Contracts\IHandler;
use App\Entity\Auftrag;
use App\Repository\ZuAbgaengeRepository;
use Doctrine\ORM\EntityManagerInterface;

class ZuAbgaengeHandler implements IHandler
{
    public function __construct(private ZuAbgaengeRepository $repository,
                                private EntityManagerInterface $entityManager)
    {

    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function getById(int $id): Auftrag
    {
        return $this->repository->find($id);
    }

    public function create(Auftrag $auftrag): Auftrag
    {
        $this->entityManager->persist($auftrag);
        $this->entityManager->flush();
        return $auftrag;
    }

    public function update(Auftrag $auftrag): Auftrag
    {
        $this->entityManager->flush();
        return $auftrag;
    }

    public function delete(Auftrag $auftrag): void
    {
        $this->entityManager->remove($auftrag);
        $this->entityManager->flush();
    }
}