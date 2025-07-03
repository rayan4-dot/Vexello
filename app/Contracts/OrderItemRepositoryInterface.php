<?php

namespace App\Contracts;

use App\Models\OrderItem;

interface OrderItemRepositoryInterface
{
    public function all();

    public function find(int $id): ?OrderItem;

    public function create(array $data): OrderItem;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getByOrder(int $orderId);
}
