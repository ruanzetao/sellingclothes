<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPicture extends Model
{
    public $timestamps = true;
    protected $table = 'userspicture';
    protected $fillable = ['id','ID_Users','ID_Picture','IsDelete'];
   
}
