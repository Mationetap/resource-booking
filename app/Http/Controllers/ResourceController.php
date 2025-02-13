<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Http\Resources\ResourceResource;
use App\Http\Requests\ResourceStoreRequest;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "Ресурсы", description: "API для управления ресурсами")]
class ResourceController extends Controller
{
    #[OA\Get(
        path: "/resources",
        summary: "Получить список всех ресурсов",
        tags: ["Ресурсы"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Список ресурсов успешно получен",
                content: new OA\MediaType(
                    mediaType: "application/json",
                    schema: new OA\Schema(
                        type: "array",
                        items: new OA\Items(ref: "#/components/schemas/Resource")
                    )
                )
            )
        ]
    )]
    public function index()
    {
        $resources = Resource::all();
        return ResourceResource::collection($resources);
    }

    #[OA\Post(
        path: "/resources",
        summary: "Создать новый ресурс",
        tags: ["Ресурсы"],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    required: ["name", "type"],
                    properties: [
                        new OA\Property(property: "name", type: "string", example: "Комната переговоров"),
                        new OA\Property(property: "type", type: "string", example: "room"),
                        new OA\Property(property: "description", type: "string", example: "Большая переговорная комната")
                    ]
                )
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: "Ресурс успешно создан",
                content: new OA\MediaType(
                    mediaType: "application/json",
                    schema: new OA\Schema(ref: "#/components/schemas/Resource")
                )
            ),
            new OA\Response(
                response: 422,
                description: "Ошибка валидации"
            )
        ]
    )]
    public function store(ResourceStoreRequest $request)
    {
        $resource = Resource::create($request->validated());
        return new ResourceResource($resource);
    }
}
