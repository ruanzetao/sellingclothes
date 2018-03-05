<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory as ProductCategory;
class RememberController extends Controller
{
	public function Index(){
		$listCategory = ProductCategory::all();
		return view('Account.RememberFindAccount',['categorys'=>$listCategory]);
	}
	public function Type(){
		$listCategory = ProductCategory::all();
		return view('Account.RememberType',['categorys'=>$listCategory]);
	}
	public function ChangePass(){
		if(Cookie::get('CheckToken')!=null){
			$listCategory = ProductCategory::all();
			$isDone = json_decode(Cookie::get('CheckToken'));
			if($isDone=='1'){
				Cookie::queue('CheckToken',json_encode('0'));
				return view('Account.RememberChangePass',['categorys'=>$listCategory]);
			}
		}
		return redirect('/remember/type');
	}

}
