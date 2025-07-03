<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function all()
    {
        return Order::all();
    }

    public function find(int $id): ?Order
    {
        return Order::find($id);
    }

    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $order = Order::findOrFail($id);
        return $order->update($data);
    }

    public function delete(int $id): bool
    {
        $order = Order::findOrFail($id);
        return $order->delete();
    }

    public function getByUser(int $userId)
    {
        return Order::where('user_id', $userId)->get();
    }
}
