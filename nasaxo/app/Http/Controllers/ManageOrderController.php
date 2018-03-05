<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order as Orders;
class ManageOrderController extends Controller
{
	// hiển thị view new
	public function actionNewOrder(){
		$listOrder = Orders::Where([['IsDelete','='.false],['ConfirmDate','=',null]])->get();
		return view('ManageOrder.new',['listOrder'=>$listOrder]);
	}
	// hiển thị view confirmed
	public function actionConfirmed(){
		$listOrder = Orders::Where([['IsDelete','='.false],['ConfirmDate','!=',null],['IsDelivered','=',false]])->get();
		return view('ManageOrder.confirmed',['listOrder'=>$listOrder]);
	}
	// action delete
	public function actionDelete(){
		$aParameter = array_merge($_POST, $_GET);
		$idOrder=isset($aParameter['idOrder'])? $aParameter['idOrder'] : "";
		$order = Orders::find($idOrder);
		if(isset($order)){
			$order->IsDelete = true;
			$order->save();
			return '1';
		}
		return '0';
	}
	// action done
	public function actionDone(){
		$aParameter = array_merge($_POST, $_GET);
		$idOrder=isset($aParameter['idOrder'])? $aParameter['idOrder'] : "";
		$order = Orders::find($idOrder);
		if(isset($order)){
			$order->IsDelivered = true;
			$order->IsPaied = true;
			$order->save();
			return '1';
		}
		return '0';
	}
	// action confirm
	public function actionConfirm(){
		$aParameter = array_merge($_POST, $_GET);
		$idOrder=isset($aParameter['idOrder'])? $aParameter['idOrder'] : "";
		$order = Orders::find($idOrder);
		if(isset($order)){
			$order->ConfirmDate = date('Y-m-d');
			$order->save();
			return '1';
		}
		return '0';
	}
}
