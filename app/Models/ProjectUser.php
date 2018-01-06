<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $table="project_user";
    protected $fillable=[
        'project_id','user_id'
    ];
    public function User()
    {
        return $this->belongsTo('App\User');
    }
        public function Project()
    {
        return $this->belongsTo('App\Models\Project');
    }

}
