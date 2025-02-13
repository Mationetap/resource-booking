<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Создание нового экземпляра уведомления.
     *
     * @param \App\Models\Booking $booking
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Построение сообщения.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Создано новое бронирование')
            ->markdown('emails.booking.created');
    }
}
