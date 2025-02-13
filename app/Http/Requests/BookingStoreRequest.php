<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'resource_id' => 'required|exists:resources,id',
            'user_id' => 'required|integer',
            'start_time' => 'required|date_format:Y-m-d H:i:s|before:end_time',
            'end_time' => 'required|date_format:Y-m-d H:i:s|after:start_time',
        ];
    }
}
