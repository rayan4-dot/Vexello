<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
        protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Display a listing of the resource.
     */
   public function index(): JsonResponse
    {
        $payments = $this->paymentService->getAllPayments();
        return response()->json($payments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request): JsonResponse
    {
        $payment = $this->paymentService->createPayment($request->validated());
        return response()->json($payment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $payment = $this->paymentService->getPaymentById($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json($payment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, int $id): JsonResponse
    {
        $updated = $this->paymentService->updatePayment($id, $request->validated());

        if (!$updated) {
            return response()->json(['message' => 'Payment not found or update failed'], 404);
        }

        return response()->json(['message' => 'Payment updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->paymentService->deletePayment($id);

        if (!$deleted) {
            return response()->json(['message' => 'Payment not found or delete failed'], 404);
        }

        return response()->json(['message' => 'Payment deleted successfully']);
    }
}
