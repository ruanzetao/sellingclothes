<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Size as Size;
use Response;
class ManageSizeController extends Controller
{
	public function GetSizes(){
		return view('ManageSize.index');
	}
    // lấy danh sách size
	public function actionGetSizes(){
		$valueSearch = isset($_GET['term']) ? $_GET['term']: "";
		$listSizes = Size::where([['IsDelete','=',false],['Sizes','like','%'.$valueSearch.'%']])->get();
		$aReturn=[];
		foreach ($listSizes as $value) {
			$aReturn[] = array('id'=>$value->id,'value'=>$value->Sizes);
		}
		return Response::json($aReturn);
	}	
	// lấy danh sách size
	public function actionSearch(){
		$aParameter = array_merge($_POST,$_GET);
		$valueSearch =isset($aParameter['valueSearch'])? $aParameter['valueSearch'] : "";
		$listSize = Size::where([['IsDelete','=',false],['Sizes','like','%'. $valueSearch .'%']])->get();
		return view('ManageSize._search',['listSize'=>$listSize]);
	}		
	public function actionDelete(){
		$aParameter = array_merge($_POST,$_GET);
		$idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
		$item = Size::find($idDelete);
		if(isset($item)){
			$item->IsDelete = true;
			if($item->save())
				return '1';
		}
		return '0';
	}
	public function actionAdd(){
		$aParameter = array_merge($_POST,$_GET);
		if(isset($aParameter['valueName'])){
			$valueName = $aParameter['valueName'];
			$valueDescription = isset($aParameter['valueDescription'])? $aParameter['valueDescription']:"";
			$newItem = isset($aParameter['idSend']) ? Size::find($aParameter['idSend']) : new Size;
			$newItem->Sizes = $valueName;
			$newItem->Description= $valueDescription;
			$newItem->IsDelete = false;
			if($newItem->save()){
				return $newItem;
			}
		}
		return '0';
	}
}
