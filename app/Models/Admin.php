<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes;
    use HasFactory;
    protected $table = ADMIN;
    protected $guard = 'admin';
    protected $appends = ['user_type','uploader_type'];


    public function getUserTypeAttribute()
    {
        return 'admin';
    }

    public function getUploaderTypeAttribute()
    {
        return 1;
    }

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

    
}
