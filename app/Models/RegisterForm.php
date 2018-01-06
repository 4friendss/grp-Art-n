<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterForm extends Model
{
    protected $table="registerForms";
    protected $fillable=['full_name','email','gender','age','education','tel','expert'];

}
