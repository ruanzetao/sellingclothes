<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $timestamps = true;
    protected $table = 'color';
    protected $fillable = ['id','Description','Color','IsDelete'];
    
}
