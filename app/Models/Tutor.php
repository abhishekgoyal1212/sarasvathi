<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
   
    protected $table = TUTOR;
    protected $guard = 'tutor';
    protected $appends = ['user_type','uploader_type'];


    public function getUserTypeAttribute()
    {
        return 'tutor';
    }

    public function getUploaderTypeAttribute()
    {
        return 2;
    }
   
} 
