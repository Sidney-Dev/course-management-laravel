<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImagePathAttribute(): string
    {
        return "resources/files/course/{$this->id}/{$this->image}";
    }
}
