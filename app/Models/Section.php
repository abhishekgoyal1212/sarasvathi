<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = SECTIONS;

    
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function chapter()
    {
        return $this->belongsTo(Chapters::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
