<?php

namespace App\Handler;

use App\Entity\Hochregallager;
use App\Entity\Material;
use App\Entity\Materiallager;
use App\Entity\Plaetze;
use App\Entity\Station;
use App\Entity\ZuAbgaenge;
use App\Repository\HochregallagerRepository;
use App\Repository\MateriallagerRepository;
use App\Repository\PlaetzeRepository;
use App\Repository\StationRepository;
use App\Repository\ZuAbgaengeRepository;
use Doctrine\ORM\EntityManagerInterface;

class LagerHandler
{
    public function __construct(
        protected readonly EntityManagerInterface $entityManager,
        protected readonly HochregallagerRepository $hochregallagerRepository,
        protected readonly MateriallagerRepository $materiallagerRepository,
        protected readonly PlaetzeRepository $plaetzeRepository,
        protected readonly StationRepository $stationRepository,
        protected readonly ZuAbgaengeRepository $zuAbgaengeRepository,
    ){}

    public function loadHochregalById(int $id): Hochregallager
    {
        return $this->hochregallagerRepository->find($id);
    }

    public function loadAllHochregale(): array
    {
        return $this->hochregallagerRepository->findAll();
    }

    public function updateHochregalById(Hochregallager $hochregallager): void
    {
        $this->entityManager->persist($hochregallager);
    }

    public function deleteHochregalById(Hochregallager $hochregallager): void
    {
        $this->entityManager->remove($hochregallager);
    }

    public function loadMaterialById(int $id): Material
    {
        return $this->materiallagerRepository->find($id);
    }

    public function loadAllMaterials(): array
    {
        return $this->materiallagerRepository->findAll();
    }

    public function updateMaterialById(Material $material): void
    {
        $this->entityManager->persist($material);
    }

    public function deleteMaterialById(Material $material): void
    {
        $this->entityManager->remove($material);
    }

    public function loadPlaetzeById(int $id): Plaetze
    {
        return $this->plaetzeRepository->find($id);
    }

    public function loadAllPlaetze(): array
    {
        return $this->plaetzeRepository->findAll();
    }

    public function updatePlaetzeById(Plaetze $plaetze): void
    {
        $this->entityManager->persist($plaetze);
    }

    public function deletePlaetzeById(Plaetze $plaetze): void
    {
        $this->entityManager->remove($plaetze);
    }

    public function loadStationById(int $id): Station
    {
        return $this->stationRepository->find($id);
    }

    public function loadAllStations(): array
    {
        return $this->stationRepository->findAll();
    }

    public function updateStationById(Station $station): void
    {
        $this->entityManager->persist($station);
    }

    public function deleteStationById(Station $station): void
    {
        $this->entityManager->remove($station);
    }

    public function loadZuAbgaengeById(int $id): ZuAbgaenge
    {
        return $this->zuAbgaengeRepository->find($id);
    }

    public function loadAllZuAbgaenge(): array
    {
        return $this->zuAbgaengeRepository->findAll();
    }

    public function updateZuAbgaengeById(ZuAbgaenge $zuAbgaenge): void
    {
        $this->entityManager->persist($zuAbgaenge);
    }

    public function deleteZuAbaengeById(ZuAbgaenge $zuAbgaenge): void
    {
        $this->entityManager->remove($zuAbgaenge);
    }
}