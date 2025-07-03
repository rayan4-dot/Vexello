<?php

namespace App\Contracts;

use App\Models\Cart;

interface CartRepositoryInterface
{
    public function all();

    public function find(int $id): ?Cart;

    public function create(array $data): Cart;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;


    public function getByUser(int $userId);
}
