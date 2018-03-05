<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = true;
    protected $table = 'city';
    protected $fillable = ['id','Name','Description','IsDelete'];
    
}
