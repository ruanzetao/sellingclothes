<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionPicture extends Model
{
    public $timestamps = true;
	// table
	protected $table = 'promotionpicture';
	// fill visit
	protected $fillable = ['id','ID_Picture','ID_Promotion','IsDelete'];
	// fill hidden
	// protected $hidden = [''];
}
