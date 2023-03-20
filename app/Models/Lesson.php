<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = LESSONS;
    protected $appends = ['thumbnail_url', 'vid_name_url'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapters::class, 'chapter_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


    public function getThumbnailUrlAttribute()
    {

        if ($this->thumbnail == '') {
            return '';
        } else if (filter_var($this->thumbnail, FILTER_VALIDATE_URL)) {
            return $this->thumbnail;
        } else {
            return asset('admin-assets/img/lesson/thumbnail/' . $this->thumbnail);
        }
    }
    public function getVidNameUrlAttribute()
    {

        if ($this->vid_name == '') {
            return '';
        } else if (filter_var($this->vid_name, FILTER_VALIDATE_URL)) {
            return $this->vid_name;
        } else {
            return asset('admin-assets/video/lesson/' . $this->vid_name);
        }
    }
}
