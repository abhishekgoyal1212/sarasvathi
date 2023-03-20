<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = SUBJECT;
    protected $fillable = ['name', 'icon', 'slug', 'description', 'status'];
    protected $appends = ['icon_url'];

    public function getIconUrlAttribute()
    {
        if ($this->icon == '') {
            return '';
        } else if (filter_var($this->icon, FILTER_VALIDATE_URL)) {
            return $this->icon;
        } else {
            return asset('admin-assets/img/subject/' . $this->icon);
        }
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
    public function chapters_lessons()
    {
        return $this->hasMany(Chapters::class)->with('lessons');
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapters::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
