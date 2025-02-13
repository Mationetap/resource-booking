<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        $start = $this->faker->dateTimeBetween('now', '+1 week');
        $end = (clone $start)->modify('+2 hours');

        return [
            'resource_id' => Resource::factory(),
            'user_id'     => $this->faker->numberBetween(1, 100),
            'start_time'  => $start,
            'end_time'    => $end,
        ];
    }
}
