<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $table="project_type";
    protected $fillable=[
        'title','active'
    ];
    public function Project()
    {
        return $this->hasMany('App\Models\Project');
    }
}
