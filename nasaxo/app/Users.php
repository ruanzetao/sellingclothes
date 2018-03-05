<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	public $timestamps = true;
	protected $table = 'users';
	protected $fillable = ['id','Username','Password','Picture','Email','Description','IsDelete','remember_token'];
    // danh sacsh picture
	public function Picture(){
		return $this->belongsToMany('App\Picture','UsersPicture','ID_Users','ID_Picture');
	}
	// lấy quyền
	public function Roles(){
		return $this->belongsToMany('App\Role','User_Role','ID_Users','ID_Role');
	}
	// lấy địa chỉ giao hàng
	public function DeliveryPlace(){
		return $this->hasOne('App\DeliveryPlace','ID_User');
	}
	// lấy quyền
	public function Messages(){
		return $this->hasMany('App\Message','ID_Users');
	}
	// lấy danh sách hóa đơn
	public function Orders(){
		return $this->hasMany('App\Order','ID_User');
	}
}
