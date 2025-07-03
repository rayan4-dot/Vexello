<?php

namespace App\Contracts;

use App\Models\Payment;

interface PaymentRepositoryInterface
{
    public function all();

    public function find(int $id): ?Payment;

    public function create(array $data): Payment;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getByOrder(int $orderId);
}
