<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Services\OrderItemService;
use Illuminate\Http\JsonResponse;

class OrderItemController extends Controller
{
        protected OrderItemService $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $items = $this->orderItemService->getAllOrderItems();
        return response()->json($items);
    }
    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreOrderItemRequest $request): JsonResponse
    {
        $item = $this->orderItemService->createOrderItem($request->validated());
        return response()->json($item, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $item = $this->orderItemService->getOrderItemById($id);

        if (!$item) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderItemRequest $request, int $id): JsonResponse
    {
        $updated = $this->orderItemService->updateOrderItem($id, $request->validated());

        if (!$updated) {
            return response()->json(['message' => 'Order item not found or update failed'], 404);
        }

        return response()->json(['message' => 'Order item updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->orderItemService->deleteOrderItem($id);

        if (!$deleted) {
            return response()->json(['message' => 'Order item not found or delete failed'], 404);
        }

        return response()->json(['message' => 'Order item deleted successfully']);
    }
}
