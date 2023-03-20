<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBoard extends Model
{
    use HasFactory;
    protected $table = SCHOOLBOARDS;

    public function schools()
    {
        return $this->belongsTo(School::class);
    }


    public function boards()
    {
        return $this->belongsTo(Board::class);
    }
}
