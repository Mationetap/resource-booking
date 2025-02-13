@component('mail::message')
# Бронирование отменено

Бронирование с ID **{{ $booking->id }}** было отменено.

**Ресурс:** {{ $booking->resource_id }}

**Пользователь:** {{ $booking->user_id }}

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
