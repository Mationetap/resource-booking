<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Resource;
use App\Models\Booking;

class BookingApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Проверка создания бронирования через API.
     */
    public function testCanCreateBooking()
    {
        $resource = Resource::factory()->create();

        $data = [
            'resource_id' => $resource->id,
            'user_id'     => 123,
            'start_time'  => now()->addHour()->format('Y-m-d H:i:s'),
            'end_time'    => now()->addHours(2)->format('Y-m-d H:i:s')
        ];

        $response = $this->postJson('/api/bookings', $data);
        $response->assertStatus(201)
            ->assertJsonFragment(['resource_id' => $resource->id]);

        $this->assertDatabaseHas('bookings', ['resource_id' => $resource->id, 'user_id' => 123]);
    }

    /**
     * Проверка отмены бронирования.
     */
    public function testCanCancelBooking()
    {
        $resource = Resource::factory()->create();
        $booking = Booking::factory()->create([
            'resource_id' => $resource->id,
            'user_id'     => 123,
            'start_time'  => now()->addHour()->format('Y-m-d H:i:s'),
            'end_time'    => now()->addHours(2)->format('Y-m-d H:i:s')
        ]);

        $response = $this->deleteJson("/api/bookings/{$booking->id}");
        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Бронирование отменено']);

        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
    }
}
