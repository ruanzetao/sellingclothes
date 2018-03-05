<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = true;
    protected $table = 'district';
    protected $fillable = ['id','Name','Description','ID_City','IsDelete'];
   // get city
   public function City(){
    	return $this->belongsTo('App\City','ID_City');
   }
}
