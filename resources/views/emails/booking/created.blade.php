@component('mail::message')
# Новое бронирование создано

Бронирование с ID **{{ $booking->id }}** успешно создано.

**Ресурс:** {{ $booking->resource_id }}

**Пользователь:** {{ $booking->user_id }}

**Начало:** {{ $booking->start_time }}

**Конец:** {{ $booking->end_time }}

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
