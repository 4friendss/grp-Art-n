<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $table="project_image";
    protected $fillable=[
        'title','description','date','src','active','project_id'
    ];
    public function Project()
    {
        return $this->belongTo('App\Models\Project');
    }
}
