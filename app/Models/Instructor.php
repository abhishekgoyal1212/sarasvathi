<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    // use Authenticatable;
    protected $table = INSTRUCT;
    protected $guard = 'instructor';
    protected $appends = ['user_type','uploader_type'];


    public function getUserTypeAttribute()
    {
        return 'instructor';
    }

    public function getUploaderTypeAttribute()
    {
        return 3;
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
