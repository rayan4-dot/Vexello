<?php

namespace App\Contracts;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function all();

    public function find(int $id): ?Order;

    public function create(array $data): Order;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getByUser(int $userId);
}
