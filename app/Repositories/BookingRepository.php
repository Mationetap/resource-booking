<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository implements BookingRepositoryInterface
{
    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    public function findById(int $id): ?Booking
    {
        return Booking::find($id);
    }

    public function delete(int $id): bool
    {
        $booking = $this->findById($id);
        if ($booking) {
            return $booking->delete();
        }
        return false;
    }
}
