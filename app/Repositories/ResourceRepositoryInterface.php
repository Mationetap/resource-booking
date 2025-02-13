<?php

namespace App\Repositories;

use App\Models\Resource;

interface ResourceRepositoryInterface
{
    /**
     * Получить все ресурсы.
     */
    public function getAll();

    /**
     * Создать новый ресурс.
     */
    public function create(array $data): Resource;

    /**
     * Найти ресурс по его ID.
     */
    public function findById(int $id): ?Resource;
}
