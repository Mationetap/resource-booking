<?php

namespace App\Repositories;

use App\Models\Resource;

class ResourceRepository implements ResourceRepositoryInterface
{
    public function getAll()
    {
        return Resource::all();
    }

    public function create(array $data): Resource
    {
        return Resource::create($data);
    }

    public function findById(int $id): ?Resource
    {
        return Resource::find($id);
    }
}
