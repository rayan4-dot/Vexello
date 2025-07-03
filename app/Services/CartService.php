<?php

namespace App\Services;

use App\Contracts\CartRepositoryInterface;
use App\Models\Cart;

class CartService
{
    protected CartRepositoryInterface $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getAllCarts()
    {
        return $this->cartRepository->all();
    }

    public function getCartById(int $id): ?Cart
    {
        return $this->cartRepository->find($id);
    }

    public function createCart(array $data): Cart
    {
        return $this->cartRepository->create($data);
    }

    public function updateCart(int $id, array $data): bool
    {
        return $this->cartRepository->update($id, $data);
    }

    public function deleteCart(int $id): bool
    {
        return $this->cartRepository->delete($id);
    }

    public function getCartByUser(int $userId)
    {
        return $this->cartRepository->getByUser($userId);
    }
}
