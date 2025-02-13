<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingCreatedMail;

class SendBookingCreatedNotification
{
    /**
     * Обработка события.
     *
     * @param  \App\Events\BookingCreated  $event
     * @return void
     */
    public function handle(BookingCreated $event)
    {
        // Укажите email получателя. Можно использовать данные бронирования или пользователя.
        $recipientEmail = 'recipient@example.com';

        // Отправка email уведомления
        Mail::to($recipientEmail)->send(new BookingCreatedMail($event->booking));
    }
}
