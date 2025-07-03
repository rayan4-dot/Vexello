<?php

namespace App\Repositories;

use App\Contracts\PaymentRepositoryInterface;
use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function all()
    {
        return Payment::all();
    }

    public function find(int $id): ?Payment
    {
        return Payment::find($id);
    }

    public function create(array $data): Payment
    {
        return Payment::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $payment = Payment::findOrFail($id);
        return $payment->update($data);
    }

    public function delete(int $id): bool
    {
        $payment = Payment::findOrFail($id);
        return $payment->delete();
    }

    public function getByOrder(int $orderId)
    {
        return Payment::where('order_id', $orderId)->get();
    }
}
