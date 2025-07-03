<?php

namespace App\Services;

use App\Contracts\PaymentRepositoryInterface;
use App\Models\Payment;

class PaymentService
{
    protected PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function getAllPayments()
    {
        return $this->paymentRepository->all();
    }

    public function getPaymentById(int $id): ?Payment
    {
        return $this->paymentRepository->find($id);
    }

    public function createPayment(array $data): Payment
    {
        return $this->paymentRepository->create($data);
    }

    public function updatePayment(int $id, array $data): bool
    {
        return $this->paymentRepository->update($id, $data);
    }

    public function deletePayment(int $id): bool
    {
        return $this->paymentRepository->delete($id);
    }

    public function getPaymentsByOrder(int $orderId)
    {
        return $this->paymentRepository->getByOrder($orderId);
    }
}
