<?php

namespace App\Observers;

use App\Models\Booking;
use App\Events\BookingCreated;
use App\Events\BookingCancelled;

class BookingObserver
{
    /**
     * Обработка события после создания бронирования.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {

        event(new BookingCreated($booking));
    }

    /**
     * Обработка события после удаления (отмены) бронирования.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        event(new BookingCancelled($booking));
    }
}
