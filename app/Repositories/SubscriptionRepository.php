<?php

namespace App\Repositories;

use App\Contracts\SubscriptionRepositoryInterface;
use App\Models\Subscription;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function all()
    {
        return Subscription::all();
    }

    public function find(int $id): ?Subscription
    {
        return Subscription::find($id);
    }

    public function create(array $data): Subscription
    {
        return Subscription::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $subscription = Subscription::findOrFail($id);
        return $subscription->update($data);
    }

    public function delete(int $id): bool
    {
        $subscription = Subscription::findOrFail($id);
        return $subscription->delete();
    }

    public function getByUser(int $userId)
    {
        return Subscription::where('user_id', $userId)->get();
    }
}
