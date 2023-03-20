<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = EXAMS;
    protected $fillable = ['name', 'icon', 'slug', 'description', 'status'];
    protected $appends = ['icon_url'];

    public function getIconUrlAttribute()
    {

        if ($this->icon == '') {
            return '';
        } elseif (filter_var($this->icon, FILTER_VALIDATE_URL)) {
            return $this->icon;
        } else {
            return asset('admin-assets/img/exam/' . $this->icon);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
