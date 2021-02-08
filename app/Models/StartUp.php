<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StartUp extends Model
{
    use HasFactory, SoftDeletes;


    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
