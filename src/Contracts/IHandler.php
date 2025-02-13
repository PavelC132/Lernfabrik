<?php

namespace App\Contracts;

use App\Entity\Auftrag;

interface IHandler
{
    public function getAll();

    public function getById(int $id): Auftrag;

    public function create(Auftrag $auftrag): Auftrag;

    public function update(Auftrag $auftrag): Auftrag;

    public function delete(Auftrag $auftrag): void;
}