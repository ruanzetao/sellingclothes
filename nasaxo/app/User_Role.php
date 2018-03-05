<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    public $timestamps = true;
    protected $table = 'user_role';
    protected $fillable = ['id','ID_Users','ID_Role','IsDelete'];
   
}
