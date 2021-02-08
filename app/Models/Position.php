<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $casts = [
        'role_keywords' => 'array',
        'skill_keywords' => 'array'
    ];


    public function features(){
        return $this->belongsToMany(Feature::class);
    }
}
