<?php

namespace App\Services;

use App\Contracts\OrderItemRepositoryInterface;
use App\Models\OrderItem;

class OrderItemService
{
    protected OrderItemRepositoryInterface $orderItemRepository;

    public function __construct(OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function getAllOrderItems()
    {
        return $this->orderItemRepository->all();
    }

    public function getOrderItemById(int $id): ?OrderItem
    {
        return $this->orderItemRepository->find($id);
    }

    public function createOrderItem(array $data): OrderItem
    {
        return $this->orderItemRepository->create($data);
    }

    public function updateOrderItem(int $id, array $data): bool
    {
        return $this->orderItemRepository->update($id, $data);
    }

    public function deleteOrderItem(int $id): bool
    {
        return $this->orderItemRepository->delete($id);
    }

    public function getOrderItemsByOrder(int $orderId)
    {
        return $this->orderItemRepository->getByOrder($orderId);
    }
}
