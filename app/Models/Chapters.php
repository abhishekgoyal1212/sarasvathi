<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    use HasFactory;
    protected $table = CHAPTER;
    protected $fillable = ['name', 'icon', 'delete_status', 'status'];

    protected $appends = ['lessons_count', 'concepts_count'];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeDeleted($query)
    {
        return $query->where('delete_status', 1);
    }


    public function scopePresent($query)
    {
        return $query->where('delete_status', 0);
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function concepts()
    {
        return $this->hasMany(Concept::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'chapter_id', 'id');
    }
    public function getLessonsCountAttribute()
    {
        return $this->hasMany(Lesson::class,'chapter_id')->count();
    }
    public function getConceptsCountAttribute()
    {
        return $this->hasMany(Concept::class,'chapter_id')->count();
    }
}
