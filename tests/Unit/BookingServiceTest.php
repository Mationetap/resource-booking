<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Booking;
use App\Models\Resource;
use App\Services\BookingService;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\ResourceRepositoryInterface;
use Mockery;
use Exception;

class BookingServiceTest extends TestCase
{
    protected $bookingRepo;
    protected $resourceRepo;
    protected $bookingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bookingRepo = Mockery::mock(BookingRepositoryInterface::class);
        $this->resourceRepo = Mockery::mock(ResourceRepositoryInterface::class);
        $this->bookingService = new BookingService($this->bookingRepo, $this->resourceRepo);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * Проверяем, что при отсутствии ресурса выбрасывается исключение.
     */
    public function testCreateBookingThrowsExceptionIfResourceNotFound()
    {
        $data = [
            'resource_id' => 1,
            'user_id'     => 123,
            'start_time'  => '2025-03-01 10:00:00',
            'end_time'    => '2025-03-01 12:00:00',
        ];

        $this->resourceRepo
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn(null);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Ресурс не найден.');

        $this->bookingService->createBooking($data);
    }

    /**
     * Проверяем, что при корректных данных возвращается экземпляр Booking.
     */
    public function testCreateBookingReturnsBookingInstance()
    {
        $data = [
            'resource_id' => 1,
            'user_id'     => 123,
            'start_time'  => '2025-03-01 10:00:00',
            'end_time'    => '2025-03-01 12:00:00',
        ];

        // Симулируем существование ресурса
        $resource = new Resource($data);
        $this->resourceRepo
            ->shouldReceive('findById')
            ->once()
            ->with(1)
            ->andReturn($resource);

        // Симулируем создание бронирования
        $booking = new Booking($data);
        $this->bookingRepo
            ->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn($booking);

        $result = $this->bookingService->createBooking($data);
        $this->assertInstanceOf(Booking::class, $result);
    }
}
