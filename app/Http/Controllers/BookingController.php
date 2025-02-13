<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "Бронирования", description: "API для управления бронированиями")]
class BookingController extends Controller
{
    protected BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    #[OA\Post(
        path: "/bookings",
        summary: "Создать бронирование",
        tags: ["Бронирования"],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    required: ["resource_id", "user_id", "start_time", "end_time"],
                    properties: [
                        new OA\Property(property: "resource_id", type: "integer", example: 1),
                        new OA\Property(property: "user_id", type: "integer", example: 123),
                        new OA\Property(property: "start_time", type: "string", format: "date-time", example: "2025-03-01 10:00:00"),
                        new OA\Property(property: "end_time", type: "string", format: "date-time", example: "2025-03-01 12:00:00")
                    ]
                )
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: "Бронирование успешно создано",
                content: new OA\MediaType(
                    mediaType: "application/json",
                    schema: new OA\Schema(ref: "#/components/schemas/Booking")
                )
            ),
            new OA\Response(
                response: 422,
                description: "Ошибка валидации"
            )
        ]
    )]
    public function store(BookingStoreRequest $request)
    {
        $booking = $this->bookingService->createBooking($request->validated());
        return new BookingResource($booking);
    }

    #[OA\Delete(
        path: "/bookings/{id}",
        summary: "Отменить бронирование",
        tags: ["Бронирования"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                description: "ID бронирования",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Бронирование отменено",
                content: new OA\MediaType(
                    mediaType: "application/json",
                    schema: new OA\Schema(
                        properties: [
                            new OA\Property(property: "message", type: "string", example: "Бронирование отменено")
                        ]
                    )
                )
            ),
            new OA\Response(
                response: 400,
                description: "Ошибка отмены бронирования"
            )
        ]
    )]
    public function destroy($id)
    {
        $result = $this->bookingService->cancelBooking($id);
        return response()->json(['message' => $result ? 'Бронирование отменено' : 'Ошибка отмены'], $result ? 200 : 400);
    }
}
