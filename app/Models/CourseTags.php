<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTags extends Model
{
    use HasFactory;
    protected $table = COURTAG;

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsTo(Tags::class);
    }
}
