<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table = TAGS;
    protected $fillable = ['name', 'slug', 'status'];


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

    public function coursetags()
    {
        return $this->hasMany(CourseTags::class);
    }
}
