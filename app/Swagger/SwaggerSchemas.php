<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "Resource",
    type: "object",
    title: "Ресурс",
    required: ["id", "name", "type"],
    properties: [
        new OA\Property(property: "id", type: "integer", example: 1),
        new OA\Property(property: "name", type: "string", example: "Комната переговоров"),
        new OA\Property(property: "type", type: "string", example: "room"),
        new OA\Property(property: "description", type: "string", example: "Большая переговорная комната"),
        new OA\Property(property: "created_at", type: "string", format: "date-time", example: "2021-01-01T00:00:00Z"),
        new OA\Property(property: "updated_at", type: "string", format: "date-time", example: "2021-01-01T00:00:00Z")
    ]
)]
class ResourceSchema
{
}

#[OA\Schema(
    schema: "Booking",
    type: "object",
    title: "Бронирование",
    required: ["id", "resource_id", "user_id", "start_time", "end_time"],
    properties: [
        new OA\Property(property: "id", type: "integer", example: 1),
        new OA\Property(property: "resource_id", type: "integer", example: 1),
        new OA\Property(property: "user_id", type: "integer", example: 123),
        new OA\Property(property: "start_time", type: "string", format: "date-time", example: "2021-01-01T10:00:00Z"),
        new OA\Property(property: "end_time", type: "string", format: "date-time", example: "2021-01-01T12:00:00Z"),
        new OA\Property(property: "created_at", type: "string", format: "date-time", example: "2021-01-01T00:00:00Z"),
        new OA\Property(property: "updated_at", type: "string", format: "date-time", example: "2021-01-01T00:00:00Z")
    ]
)]
class BookingSchema
{
}
