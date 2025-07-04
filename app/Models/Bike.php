<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class bike extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function riders()
    {
        return $this->belongsToMany(Rider::class)->withTimestamps()->withPivot(['assigned_at', 'unassigned_at']);
    }
 
}