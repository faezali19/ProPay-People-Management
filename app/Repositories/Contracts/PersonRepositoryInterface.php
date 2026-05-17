<?php

namespace App\Repositories\Contracts;

interface PersonRepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function create(array $data): mixed;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function getAllLanguages();
    public function getAllInterests();
}