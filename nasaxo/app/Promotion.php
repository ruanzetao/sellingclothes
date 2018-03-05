<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
	public $timestamps = true;
	// table
	protected $table = 'promotion';
	// fill visit
	protected $fillable = ['id','Description','Name','Discount','BasePurchase','StartDate','EndDate','IsDelete'];
	// fill hidden
	// protected $hidden = [''];
	public function Pictures(){
		return $this->belongsToMany('App\Picture','PromotionPicture','ID_Promotion','ID_Picture');
	}
}
