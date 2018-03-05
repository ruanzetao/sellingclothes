<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = true;
	// table
	protected $table = 'OrderProduct';
	// fill visit
	protected $fillable = ['id','ID_Order','ID_Product','ID_Size','ID_Color','Count','IsInCart','Description','IsDelete','ID_User'];
	// fill hidden
	// protected $hidden = [''];
	public function Product(){
		return $this->belongsTo('App\Product','ID_Product');
	}
}
