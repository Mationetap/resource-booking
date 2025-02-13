<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'type' => 'required|string',
            'description' => 'nullable|string'
        ];
    }
}
