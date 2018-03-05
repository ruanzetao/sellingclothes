<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = true;
    protected $table = 'role';
    protected $fillable = ['id','Name','Description','IsDelete'];

}
