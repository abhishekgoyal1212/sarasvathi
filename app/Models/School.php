<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
   
    protected $table = SCHOOL;
    protected $guard = 'school';
    protected $appends = ['user_type','uploader_type'];


    public function getUserTypeAttribute()
    {
        return 'school';
    }

    public function getUploaderTypeAttribute()
    {
        return 3;
    }


    public function schoolboards()
    {
        return $this->hasMany(SchoolBoard::class);
    } 
}
  