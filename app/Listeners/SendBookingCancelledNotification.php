<?php

namespace App\Listeners;

use App\Events\BookingCancelled;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingCancelledMail;

class SendBookingCancelledNotification
{
    /**
     * Обработка события.
     *
     * @param  \App\Events\BookingCancelled  $event
     * @return void
     */
    public function handle(BookingCancelled $event)
    {
        // Укажите email получателя
        $recipientEmail = 'recipient@example.com';

        // Отправка email уведомления
        Mail::to($recipientEmail)->send(new BookingCancelledMail($event->booking));
    }
}
