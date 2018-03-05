<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $timestamps = true;
    protected $table = 'size';
    protected $fillable = ['id','Sizes','Description','IsDelete'];
   
}
