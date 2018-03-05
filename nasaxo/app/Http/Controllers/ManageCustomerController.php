<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users as Users;
use Mail;
class ManageCustomerController extends Controller
{
	public function GetCustomers(){
		return view('ManageCustomer.index');
	}
	// lấy danh sách customer theo input search
	public function actionSearch(){
		$aParameter = array_merge($_POST,$_GET);
		$valueSearch = "";
		if(isset($aParameter['valueSearch'])){
			$valueSearch=$aParameter['valueSearch'];
		}
		// lấy danh sách khách hàng từ database
		$listCustomer=Users::Where([['IsDelete','=',false],['Username','like','%'.$valueSearch.'%']])->orWhere([['IsDelete','=',false],['Email','like','%'.$valueSearch.'%']])->get();
		return view('ManageCustomer._search',['listUser'=>$listCustomer]);
	}
	// lấy danh sách customer theo input search
	public function actionSendMail(){
		$aParameter = array_merge($_POST,$_GET);
		$idSend = $aParameter['idSend'];
		$user = Users::find($idSend);
		if(isset($user)){
			$emailsend = $user->Email;
			$valueSend = $aParameter['valueSend'];
			$data = ['value'=>$valueSend];
			Mail::send('ManageCustomer.mail',$data,function ($message) use ($emailsend){
				$message->from('nasaxo.uit@gmail.com', 'Nasaxo Website');
				$message->to($emailsend,$emailsend );
				$message->subject('Tin mới từ Nasaxo website');
			});
			return '1';
		}
		return '0';
		
	}
}
