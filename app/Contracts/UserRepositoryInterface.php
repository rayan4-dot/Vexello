<?php

namespace App\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function all();

    public function find(int $id): ?User;

    public function create(array $data): User;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
