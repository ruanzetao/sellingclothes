<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users as Users;
use App\Message as Message;
use Cookie;
class ManageHomeController extends Controller
{
	public function Index(){
		if($this->isLogin([1])){
			$user = Users::find($this->getIdLogin());
			return view('ManageHome.index',['userLogin'=>$user]);
		}
		return view('ManageLogin.ManageLogin');
	}
	// 
	public function Profile(){
		if($this->isLogin([1])){
            // category 
			$idUser= $this->getIdLogin();
			// lấy số lượng message
			$countNotify=Message::where([['IsNotify','=',true],['IsDelete','=',false],['ID_Users','=',$idUser]])->count();
			return view('ManageHome._profile',['countNotify'=>$countNotify]);
		}
		return redirect('/admin');
	}
	// log out
	public function logOut(){
    	// email login
		Cookie::queue(
			Cookie::forget('accountHome')
		);
		return '1';
	}
	public function Login(){
		// check đã login
		if($this->isLogin([1])){
			$user = Users::find($this->getIdLogin());
			return view('ManageHome.index',['userLogin'=>$user]);
		}
    	// email login
		if(isset($_POST['email'])){
			$email= $_POST['email'];
		}
		if(isset($_POST['password'])){
			$password= $_POST['password'];
		}
		if(!isset($email) || !isset($password)){
			return view('ManageLogin.ManageLogin',['isFalse'=>true]);
		}
		// get user
		$user=Users::where([['Email','=',$email],['Password','=',md5($password)]])->orWhere([['Username','=',$email],['Password','=',md5($password)]])->get();
		if(count($user)>0){
			$roleUser=$user[0]->Roles()->get();
			if(count($roleUser)>0 && $roleUser[0]->id==1){
				$imgUrl=LoginController::$imageDefault;
				$picture =  $user[0]->Picture()->get();
				if(count($picture)>0){
					$imgUrl=$picture[0]->Url;
				}
				// set cookie
				$cookieValue= array('id' =>$user[0]->id,'image'=>$imgUrl,'username'=>$user[0]->Username,'description'=>$user[0]->Description);
				Cookie::queue('accountHome',json_encode($cookieValue));
				return view('ManageHome.index',['UserView'=>$cookieValue,'userLogin'=>$user[0]]);
			}
		}
		return view('ManageLogin.ManageLogin',['isFalse'=>true]);
	}
}
