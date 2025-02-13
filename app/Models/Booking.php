<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['resource_id', 'user_id', 'start_time', 'end_time'];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
