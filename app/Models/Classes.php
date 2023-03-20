<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = CLASSES;
    protected $fillable = ['name', 'slug', 'description', 'status'];
    protected $appends = ['streams'];

    public function getStreamsAttribute()
    {
        if ($this->above_10 != 0) {
            $streams = array(
                array(
                    'name' => 'Science',
                    'value' => 1,
                    'icon' => asset('admin-assets/img/streams/icons.png'),
                    'hexcolor_1' => '#000000',
                    'hexcolor_2' => '#000000',

                ),
                array(
                    'name' => 'Commerce',
                    'value' => 2,
                    'icon' => asset('admin-assets/img/streams/icons.png'),
                    'hexcolor_1' => '#000000',
                    'hexcolor_2' => '#000000',

                ),
                array(
                    'name' => 'Arts/Humanities',
                    'value' => 3,
                    'icon' => asset('admin-assets/img/streams/icons.png'),
                    'hexcolor_1' => '#000000',
                    'hexcolor_2' => '#000000',

                ),
            );
            return  $streams;
        } else {
            return array();
        }
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
