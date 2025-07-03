<?php

namespace App\Contracts;

use App\Models\Subscription;

interface SubscriptionRepositoryInterface
{
    public function all();

    public function find(int $id): ?Subscription;

    public function create(array $data): Subscription;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getByUser(int $userId);
}
