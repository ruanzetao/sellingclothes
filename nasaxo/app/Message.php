<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = true;
    protected $table = 'message';
    protected $fillable = ['id','Description','ID_Users','CreateDate','IsNotify','IsDelete'];
    
}
