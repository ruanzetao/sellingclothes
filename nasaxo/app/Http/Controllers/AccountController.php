<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory as ProductCategory;
use Mail;
use Cookie;
use App\Users as Users;
use App\Message as Message;
use App\Picture as Picture;
use App\UsersPicture as UsersPicture;
class AccountController extends Controller
{
	public function Index(){
		if($this->isLogin([1,2])){
            // category 
			$listCategory = ProductCategory::all();
			$idUser= $this->getIdLogin();
			// lấy số lượng message
			$countNotify=Message::where([['IsNotify','=',true],['IsDelete','=',false],['ID_Users','=',$idUser]])->count();
			return view('Account.index',['categorys'=>$listCategory,'countNotify'=>$countNotify]);
		}
		return redirect('/');
	}
	// thông tin account
	public function Info(){
		$idUser= $this->getIdLogin();
		$user = Users::find($idUser);
		if(count($user)>0){
			return view('Account.InfomationAccount',['user'=>$user]);
		}
		return 'Có lỗi xảy ra!';
	}
		// thông tin account
	public function Order(){
		$idUser= $this->getIdLogin();
		$user = Users::find($idUser);
		if(count($user)>0){
			return view('Account.OrderAccount',['user'=>$user]);
		}
		return 'Có lỗi xảy ra!';
	}
	// tin nhắn account
	public function Mess(){
		$idUser= $this->getIdLogin();
		$user = Users::find($idUser);
		if(count($user)>0){
			return view('Account.MessageAccount',['user'=>$user]);
		}
		return 'Có lỗi xảy ra!';
	}
	// thay đổi mật khẩu
	public function CheckPassOld(){
		if($this->isLogin([1,2])){
			$aParameter = array_merge($_GET,$_POST);
			$passOld = $aParameter['passOld'];
			$idUser= $this->getIdLogin();
			$user = Users::where([['id','=',$idUser],['Password','=',md5($passOld)]])->get();
			if(count($user)>0 && isset($user[0]->id)){
				return '1';
			}
		}
		return '0';
	}
	// xóa mess
	public function UpdateMess(){
		if($this->isLogin([1,2])){
			$aParameter = array_merge($_GET,$_POST);
			if(isset($aParameter['idUpdate'])){
				$mess=Message::find($aParameter['idUpdate']);
				if($mess){
					if(isset($aParameter['notify'])){
						$mess->IsNotify = $aParameter['notify'] == '1' ? false : true;
					}else{
						$mess->IsDelete = true;
					}
					$mess->save();
					return '1';
				}
			}
		}
		return '0';
	}
	// tìm kiếm account từ email hoặc username
	public function FindAcount(){
		$aParameter = array_merge($_GET,$_POST);
		if(isset($aParameter['valueFind'])){
			$user=Users::where([['Username','=',$aParameter['valueFind']]])->orWhere([['Email','=',$aParameter['valueFind']]])->get();
			if(count($user)>0){
				$random = $this->generateRandomString(5);
				$user[0]->remember_token = md5($random);
				$user[0]->save();
				$emailSend = $user[0]->Email;
				$username = $user[0]->Username;
				$data = ['Remember'=>$random];
				Mail::send('Account.rememberMail',$data,function ($message) use ($emailSend,$username){
					$message->from('nasaxo.uit@gmail.com', 'Nasaxo Website');
					$message->to( $emailSend ,  $emailSend );
					$message->subject('Xác nhận tài khoản '. $username);
				});
				Cookie::queue('RememberAccount',json_encode($user[0]->id));
				return '1';
			}
		}
		return '0';
	}
	// tìm kiếm account từ email hoặc username
	public function CheckToken(){
		$aParameter = array_merge($_GET,$_POST);
		if(isset($aParameter['valueRemember']) && Cookie::get('RememberAccount')!=null){
			$idUser = json_decode(Cookie::get('RememberAccount'));
			$user=Users::find($idUser);
			if(count($user)>0){
				if($user->remember_token == md5($aParameter['valueRemember'])){
					Cookie::queue('CheckToken',json_encode('1'));
					return '1';
				};
			}
		}
		return '0';
	}
	// thực hiện thay đổi mật khẩu
	public function ChangePass(){
		$aParameter = array_merge($_GET,$_POST);
		if(isset($aParameter['passNew'])){

			$idUser = json_decode(Cookie::get('RememberAccount'));
			$user=Users::find($idUser);
			if(count($user)>0){
				$random = $this->generateRandomString(5);
				$user->remember_token = md5($random);
				$user->Password = md5($aParameter['passNew']);
				$user->save();
				$imgUrl=AccountController::$imageDefault;
				$picture =  $user->Picture()->get();
				if(count($picture)>0){
					$imgUrl=$picture[0]->Url;
				}
				// set cookie
				$cookieValue= array('id' =>$user->id,'image'=>$imgUrl);
				Cookie::queue('accountHome',json_encode($cookieValue));
				return '1';
			}
		}
		return '0';
	}
	// thay đổi thông tin
	public function ChangeInfo(){
		if($this->isLogin([1,2])){
			$aParameter = array_merge($_GET,$_POST);
			

			$idUser =  $this->getIdLogin();
			$user = null;
			if(isset($aParameter['PasswordOld']) && isset($aParameter['Password'])){
				$user=Users::where([['id','=',$idUser],['Password','=',md5($aParameter['PasswordOld'])]])->get();
			}else {
				$user=Users::where([['id','=',$idUser]])->get();
			}
			if($user!=null && count($user)>0){
				if(isset($aParameter['PasswordOld']) && isset($aParameter['Password'])){
					$user[0]->Description = $aParameter['Description'];
					$user[0]->Password = md5($aParameter['Password']);
				}else {
					$user[0]->Description = $aParameter['Description'];
				}

				// insert picture
				$extention = $this->getTypeImage($aParameter['image']);
				$idMaxImage = Picture::max('id');
				$imageName = ++$idMaxImage. '.' . $extention;
				$url =  'public/images/accounts'.'/'. $imageName;
				$picture = new Picture;
				$picture->Url = 'accounts/'.$imageName;
				$picture->IsDelete = false;

				// thêm userpicture
				$userPicture = new UsersPicture;
				$userPicture->ID_Users = $user[0]->id;
				$userPicture->ID_Picture = $idMaxImage;
				$userPicture->IsDelete = false;

				// delete user picture
				$listDelete = UsersPicture::where([['ID_Users','=',$user[0]->id]])->get();
				
				file_put_contents($url,file_get_contents($aParameter['image']));
				if($user[0]->save() && $picture->save() && $userPicture->save())
					foreach ($listDelete as $pictureDelete){
						$this->deleteImage($pictureDelete->ID_Picture,$pictureDelete);
					}
					$cookieValue= array('id' =>$user[0]->id,'image'=>$picture->Url,'username'=>$user[0]->Username,'description'=>$user[0]->Description);
					Cookie::queue('accountHome',json_encode($cookieValue));
					return '1';
				}
			}
			return '0';
		}


	}
