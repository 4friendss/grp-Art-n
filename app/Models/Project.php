<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table="projects";
    protected $fillable=[
        'title','description','active','notification_date','agreement_date','agreement_start_date',
        'agreement_end_date','real_start_date','real_end_date'
    ];
    public function ProjectType()
    {
        return $this->belongsTo('App\Model\ProjectType');
    }
    public function ProjectImage()
    {
        return $this->hasMany('App\Models\ProjectImage','project_id');
    }
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
    public function ProjectUser()
    {
        return $this->hasMany('App\Models\ProjectUser');
    }
}
