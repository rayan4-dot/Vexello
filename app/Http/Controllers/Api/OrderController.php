<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{

       protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
            $orders = $this->orderService->getAllOrders();
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(StoreOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder($request->validated());
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
  
    public function show(int $id): JsonResponse
    {
        $order = $this->orderService->getOrderById($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateOrderRequest $request, int $id): JsonResponse
    {
        $updated = $this->orderService->updateOrder($id, $request->validated());

        if (!$updated) {
            return response()->json(['message' => 'Order not found or update failed'], 404);
        }

        return response()->json(['message' => 'Order updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
 
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->orderService->deleteOrder($id);

        if (!$deleted) {
            return response()->json(['message' => 'Order not found or delete failed'], 404);
        }

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
