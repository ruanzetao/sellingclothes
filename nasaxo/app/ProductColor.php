<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    public $timestamps = true;
    protected $table = 'productcolor';
    protected $fillable = ['id','ID_Product','ID_Color','IsDelete'];
   
}
