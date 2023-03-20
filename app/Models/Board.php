<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = BOARD;
    protected $fillable = ['name', 'icon', 'slug', 'description', 'status'];
    protected $appends = ['icon_url'];

    public function getIconUrlAttribute()
    {

        if (filter_var($this->icon, FILTER_VALIDATE_URL)) {
            return $this->icon;
        } else {
            return asset('admin-assets/img/board/' . $this->icon);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
    
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

   
}
