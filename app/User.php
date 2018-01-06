<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','name','family','email', 'password','picture','resume_src','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Project()
    {
        return $this->belongsToMany('App\Models\Project');
    }
    public function ProjectUser()
    {
        return $this->hasMany('App\Models\ProjectUser');
    }
}
