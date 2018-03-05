<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = true;
    protected $table = 'Rating';
    protected $fillable = ['id','Point','ID_Product','ID_Users','IsDelete'];

}
