<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    public $timestamps = true;
	// table
	protected $table = 'productprice';
	// fill visit
	protected $fillable = ['id','Price','StartDate','EndDate','IsDelete','ID_Product','Discount'];
	// fill hidden
	// protected $hidden = [''];
}
