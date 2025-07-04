<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rider extends Model
{
   use HasFactory;
   protected $fillable = [
    'full_name',
    'mobile_number',
    'email',
    'emirates_id_number',
    'passport_number',
    'visa_expiry_date',
    'date_of_birth',
    'status',
    ];

    public function bikes()
    {  
        return $this->belongsToMany(Bike::class)->withTimestamps()->withPivot(['assigned_at', 'unassigned_at']);
    }

}
