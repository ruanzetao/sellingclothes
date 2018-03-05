<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	public $timestamps = true;
	// table
	protected $table = 'productcategory';
	// fill visit
	protected $fillable = ['id','Name','Description','IsDelete'];
	// fill hidden
	// protected $hidden = [''];
	public function Products(){
		return $this->hasMany('App\Product','ID_ProductCategory');
	}
}
