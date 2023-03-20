<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = BOOKMARK;

    public function lesson()
    {
        return $this->belongsTo(Lesson::class)->with('chapter');
    }
    public function concept()
    {
        return $this->belongsTo(Concept::class)->with('chapter');
    }
}
