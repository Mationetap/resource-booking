<?php

namespace App\Services;

use App\Repositories\BookingRepositoryInterface;
use App\Repositories\ResourceRepositoryInterface;
use App\Models\Booking;
use Exception;

class BookingService
{
    protected $bookingRepo;
    protected $resourceRepo;

    /**
     * Внедрение зависимостей через конструктор.
     */
    public function __construct(
        BookingRepositoryInterface $bookingRepo,
        ResourceRepositoryInterface $resourceRepo
    ) {
        $this->bookingRepo = $bookingRepo;
        $this->resourceRepo = $resourceRepo;
    }

    /**
     * Создание бронирования с проверкой бизнес-правил.
     */
    public function createBooking(array $data): Booking
    {
        // Пример проверки: убедимся, что ресурс существует
        $resource = $this->resourceRepo->findById($data['resource_id']);
        if (!$resource) {
            throw new Exception('Ресурс не найден.');
        }

        // Здесь можно добавить дополнительную логику:
        // Проверка пересечения по времени, ограничений бронирования и т.д.

        return $this->bookingRepo->create($data);
    }

    /**
     * Отмена бронирования.
     */
    public function cancelBooking(int $id): bool
    {
        $booking = $this->bookingRepo->findById($id);
        if (!$booking) {
            throw new Exception('Бронирование не найдено.');
        }
        return $this->bookingRepo->delete($id);
    }
}
