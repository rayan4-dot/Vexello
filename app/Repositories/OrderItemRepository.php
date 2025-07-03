<?php

namespace App\Repositories;

use App\Contracts\OrderItemRepositoryInterface;
use App\Models\OrderItem;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    public function all()
    {
        return OrderItem::all();
    }

    public function find(int $id): ?OrderItem
    {
        return OrderItem::find($id);
    }

    public function create(array $data): OrderItem
    {
        return OrderItem::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $orderItem = OrderItem::findOrFail($id);
        return $orderItem->update($data);
    }

    public function delete(int $id): bool
    {
        $orderItem = OrderItem::findOrFail($id);
        return $orderItem->delete();
    }

    public function getByOrder(int $orderId)
    {
        return OrderItem::where('order_id', $orderId)->get();
    }
}
