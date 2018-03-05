<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    public $timestamps = true;
	// table
	protected $table = 'ProductPicture';
	// fill visit
	protected $fillable = ['id','ID_ProductCategory','Name','Description','IsDelete'];
	// fill hidden
	// protected $hidden = [''];
}
