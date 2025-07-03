<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
class CartController extends Controller
{

        protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $carts = $this->cartService->getAllCarts();
        return response()->json($carts);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request): JsonResponse
    {
        $cart = $this->cartService->createCart($request->validated());
        return response()->json($cart, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $cart = $this->cartService->getCartById($id);

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        return response()->json($cart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, int $id): JsonResponse
    {
        $updated = $this->cartService->updateCart($id, $request->validated());

        if (!$updated) {
            return response()->json(['message' => 'Cart not found or update failed'], 404);
        }

        return response()->json(['message' => 'Cart updated successfully']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->cartService->deleteCart($id);

        if (!$deleted) {
            return response()->json(['message' => 'Cart not found or delete failed'], 404);
        }

        return response()->json(['message' => 'Cart deleted successfully']);
    }
}
