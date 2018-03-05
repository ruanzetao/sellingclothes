<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users as Users;
use App\Picture as Picture;
use App\UsersPicture as UsersPicture;
use App\User_Role as User_Role;


use Cookie;
class LoginController extends Controller
{
	public function index(){
		return view('Account.Login');
	}
    // xác nhận account
	public function Check(){
    	// email login
		if(isset($_POST['email'])){
			$email= $_POST['email'];
		}
		if(isset($_POST['password'])){
			$password= $_POST['password'];
		}
		// get user
		$user=Users::where([['Email','=',$email],['Password','=',md5($password)]])->orWhere([['Username','=',$email],['Password','=',md5($password)]])->get();
		if(count($user)>0){
			$imgUrl=LoginController::$imageDefault;
			$picture =  $user[0]->Picture()->get();
			if(count($picture)>0){
				$imgUrl=$picture[0]->Url;
			}
			// set cookie
			$cookieValue= array('id' =>$user[0]->id,'image'=>$imgUrl,'username'=>$user[0]->Username,'description'=>$user[0]->Description);
			Cookie::queue('accountHome',json_encode($cookieValue));
			return view('Account._partialAceptLogin',['Account'=>$cookieValue]);
		}
		return '0';
	}
	// kiểm tra username
	public function CheckUsername(){
		$aParameter = array_merge($_GET, $_POST);
		$username = $aParameter['usernameCheck'];
		if(!isset($username) || $username == null){
			return '1';
		}
		$user = Users::where([['Username','=',$username]])->get();
		if(count($user)>0){
			return '1';
		}
		return '0';
	}
	// check email
	public function CheckEmail(){
		$aParameter = array_merge($_GET, $_POST);
		$email = $aParameter['emailCheck'];
		if(!isset($email) || $email == null){
			return '1';
		}
		$user = Users::where([['Email','=',$email]])->get();
		if(count($user)>0){
			return '1';
		}
		return '0';
	}
	// thực hiện tạo tài khoản
	public function Rigis(){
		$aParameter = array_merge($_GET,$_POST);
		if(isset($aParameter['user'])){
			$usserNew = $aParameter['user'];
			$user=Users::where([['Email','=',$usserNew['email']]])->orWhere([['Username','=',$usserNew['username']]])->get();
			if(count($user)>0){
				return '0';
			}
			if(strlen($usserNew['password'])<8){
				return '0';
			}
			if(!filter_var($usserNew['email'], FILTER_VALIDATE_EMAIL)){
				return '0';
			}
			// save account
			$imgUrl=LoginController::$imageDefault;
			$newUs = new Users;
			$newUs->Username = $usserNew['username'];
			$newUs->Password = md5($usserNew['password']);
			$newUs->Email = $usserNew['email'];
			$newUs->Description ='';
			$newUs->IsDelete =false;
			if(!$newUs->save()){
				return '0';
			}
			// save picture
			$picture = new Picture;
			$picture->Url = $imgUrl;
			$picture->IsDelete = false;
			if(!$picture->save()){
				return '0';
			}
			// save detail img
			$pictureUser = new UsersPicture;
			$pictureUser->ID_Users = $newUs->id;
			$pictureUser->ID_Picture = $picture->id;
			$pictureUser->IsDelete = false;
			if(!$pictureUser->save()){
				return '0';
			}
			$roleDetail = new User_Role;
			$roleDetail->ID_Users =  $newUs->id;
			$roleDetail->ID_Role = 2;
			$roleDetail->IsDelete = false;
			if(!$roleDetail->save()){
				return '0';
			}
			// set cookie
			$cookieValue= array('id' =>$newUs->id,'image'=>$imgUrl);
			Cookie::queue('accountHome',json_encode($cookieValue));
			return view('Account._partialAceptLogin',['Account'=>$cookieValue]);
		}
		return '0';
	}
	// log out
	public function Out(){
    	// email login
		Cookie::queue(
			Cookie::forget('accountHome')
		);
		return view('Account._partialLogin');
	}
}
