<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public $timestamps = true;
	// table
	protected $table = 'Picture';
	// fill visit
	protected $fillable = ['id','Url','IsDelete'];
	// fill hidden
	// protected $hidden = [''];
}
