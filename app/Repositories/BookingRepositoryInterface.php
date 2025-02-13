<?php

namespace App\Repositories;

use App\Models\Booking;

interface BookingRepositoryInterface
{
    /**
     * Создать новое бронирование.
     */
    public function create(array $data): Booking;

    /**
     * Найти бронирование по ID.
     */
    public function findById(int $id): ?Booking;

    /**
     * Удалить бронирование по ID.
     */
    public function delete(int $id): bool;
}
