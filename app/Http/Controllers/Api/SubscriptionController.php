<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Services\SubscriptionService;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{

    protected SubscriptionService $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $subscriptions = $this->subscriptionService->getAllSubscriptions();
        return response()->json($subscriptions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request): JsonResponse
    {
        $subscription = $this->subscriptionService->createSubscription($request->validated());
        return response()->json($subscription, 201);
    }

    /**
     * Display the specified resource.
     */
   public function show(int $id): JsonResponse
    {
        $subscription = $this->subscriptionService->getSubscriptionById($id);

        if (!$subscription) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }

        return response()->json($subscription);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, int $id): JsonResponse
    {
        $updated = $this->subscriptionService->updateSubscription($id, $request->validated());

        if (!$updated) {
            return response()->json(['message' => 'Subscription not found or update failed'], 404);
        }

        return response()->json(['message' => 'Subscription updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->subscriptionService->deleteSubscription($id);

        if (!$deleted) {
            return response()->json(['message' => 'Subscription not found or delete failed'], 404);
        }

        return response()->json(['message' => 'Subscription deleted successfully']);
    }
}
