<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
        'images' => 'array',
    ];
}
