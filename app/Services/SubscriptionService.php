<?php

namespace App\Services;

use App\Contracts\SubscriptionRepositoryInterface;
use App\Models\Subscription;

class SubscriptionService
{
    protected SubscriptionRepositoryInterface $subscriptionRepository;

    public function __construct(SubscriptionRepositoryInterface $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function getAllSubscriptions()
    {
        return $this->subscriptionRepository->all();
    }

    public function getSubscriptionById(int $id): ?Subscription
    {
        return $this->subscriptionRepository->find($id);
    }

    public function createSubscription(array $data): Subscription
    {
        return $this->subscriptionRepository->create($data);
    }

    public function updateSubscription(int $id, array $data): bool
    {
        return $this->subscriptionRepository->update($id, $data);
    }

    public function deleteSubscription(int $id): bool
    {
        return $this->subscriptionRepository->delete($id);
    }

    public function getSubscriptionsByUser(int $userId)
    {
        return $this->subscriptionRepository->getByUser($userId);
    }
}
