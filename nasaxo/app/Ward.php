<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $timestamps = true;
    protected $table = 'ward';
    protected $fillable = ['id','Name','Description','ID_District','IsDelete'];
    // get district
     public function District(){
    	return $this->belongsTo('App\District','ID_District');
    }
}
