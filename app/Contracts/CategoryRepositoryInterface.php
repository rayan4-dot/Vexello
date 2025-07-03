<?php

namespace App\Contracts;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();

    public function find(int $id): ?Category;

    public function create(array $data): Category;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
