<?php
// app/Swagger/Models.php

/**
 * @OA\Schema(
 *     schema="Resource",
 *     type="object",
 *     title="Ресурс",
 *     required={"id", "name", "type"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Комната переговоров"),
 *     @OA\Property(property="type", type="string", example="room"),
 *     @OA\Property(property="description", type="string", example="Большая переговорная комната"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

/**
 * @OA\Schema(
 *     schema="Booking",
 *     type="object",
 *     title="Бронирование",
 *     required={"id", "resource_id", "user_id", "start_time", "end_time"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="resource_id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=123),
 *     @OA\Property(property="start_time", type="string", format="date-time", example="2025-03-01 10:00:00"),
 *     @OA\Property(property="end_time", type="string", format="date-time", example="2025-03-01 12:00:00"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
