<?php

namespace App\Repositories;

use App\Contracts\CartRepositoryInterface;
use App\Models\Cart;

class CartRepository implements CartRepositoryInterface
{
    public function all()
    {
        return Cart::all();
    }

    public function find(int $id): ?Cart
    {
        return Cart::find($id);
    }

    public function create(array $data): Cart
    {
        return Cart::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $cart = Cart::findOrFail($id);
        return $cart->update($data);
    }

    public function delete(int $id): bool
    {
        $cart = Cart::findOrFail($id);
        return $cart->delete();
    }

    public function getByUser(int $userId)
    {
        return Cart::where('user_id', $userId)->first();
    }
}
