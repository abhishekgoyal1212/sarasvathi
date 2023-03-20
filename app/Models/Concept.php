<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;
    protected $table = CONCEPT;
    protected $appends = ['file_url'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function chapter()
    {
        return $this->belongsTo(Chapters::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getFileUrlAttribute()
    {

        if ($this->file == '') {
            return '';
        } else if (filter_var($this->file, FILTER_VALIDATE_URL)) {
            return $this->file;
        } else {
            return asset('admin-assets/img/concept/' . $this->file);
        }
    }
}
