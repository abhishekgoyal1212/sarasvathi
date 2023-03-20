<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = USERS;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends = ['stream'];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setFullnameAttribute($value)
    {
        $this->attributes['fullname']= ucfirst($value);
    }
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
    public function getStreamAttribute()
    {
        if ($this->user_stream != 0) {
            if($this->user_stream == 1){
                $streams = array(
                   
                        'name' => 'Science',
                        'value' => 1,
                        'icon' => asset('admin-assets/img/streams/icons.png'),
                        'hexcolor_1' => '#000000',
                        'hexcolor_2' => '#000000',
    
                );

            }elseif($this->user_stream == 2){
                $streams = array(
                    
                    
                        'name' => 'Commerce',
                        'value' => 2,
                        'icon' => asset('admin-assets/img/streams/icons.png'),
                        'hexcolor_1' => '#000000',
                        'hexcolor_2' => '#000000',
    
                );
                    

            }else{
                $streams =    array(
                    'name' => 'Arts/Humanities',
                    'value' => 3,
                    'icon' => asset('admin-assets/img/streams/icons.png'),
                    'hexcolor_1' => '#000000',
                    'hexcolor_2' => '#000000',

                );
            }
            
            return  $streams['name'];
        } else {
            return '';
        }
    }

    // public function setCateNameAttribute($value)
    // {
    //     $this->attributes['cate_name'] = ucfirst($value);
    // }
}
