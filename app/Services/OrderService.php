<?php

namespace App\Services;

use App\Contracts\OrderRepositoryInterface;
use App\Models\Order;

class OrderService
{
    protected OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->all();
    }

    public function getOrderById(int $id): ?Order
    {
        return $this->orderRepository->find($id);
    }

    public function createOrder(array $data): Order
    {
        return $this->orderRepository->create($data);
    }

    public function updateOrder(int $id, array $data): bool
    {
        return $this->orderRepository->update($id, $data);
    }

    public function deleteOrder(int $id): bool
    {
        return $this->orderRepository->delete($id);
    }

    public function getOrdersByUser(int $userId)
    {
        return $this->orderRepository->getByUser($userId);
    }
}
