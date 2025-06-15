<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bike extends Model
{
    protected $fillable = [
        'plate_number',
        'model',
        'model_year',
        'chassis_number',
        'engine_number',
        'mulkiya_front_image',
        'mulkiya_back_image',
    ];
}
