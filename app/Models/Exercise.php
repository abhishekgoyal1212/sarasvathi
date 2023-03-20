<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table = EXERCISE;
    protected $appends = ['icon_url'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getIconUrlAttribute()
    {

        if ($this->icon == '') {
            return '';
        } else if (filter_var($this->icon, FILTER_VALIDATE_URL)) {
            return $this->icon;
        } else {
            return asset('admin-assets/img/exercise/' . $this->icon);
        }
    }
}
