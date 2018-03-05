<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color as Color;
use Response;
class ManageColorController extends Controller
{
	public function GetColors(){
		return view('ManageColor.index');
	}
	// lấy danh sách màu
	public function actionGetColors(){
		$valueSearch = isset($_GET['term']) ? $_GET['term']: "";
		$listColors = Color::where([['IsDelete','=',false],['Description','like','%'.$valueSearch.'%']])->get();
		$aReturn=[];
		foreach ($listColors as $value) {
			$aReturn[] = array('id'=>$value->id,'value'=>$value->Description,'color'=>$value->Color);
		}
		return Response::json($aReturn);
	}	
	// lấy danh sách size
	public function actionSearch(){
		$aParameter = array_merge($_POST,$_GET);
		$valueSearch =isset($aParameter['valueSearch'])? $aParameter['valueSearch'] : "";
		$listColor = Color::where([['IsDelete','=',false],['Description','like','%'. $valueSearch .'%']])->get();
		return view('ManageColor._search',['listColor'=>$listColor]);
	}	
	public function actionDelete(){
		$aParameter = array_merge($_POST,$_GET);
		$idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
		$item = Color::find($idDelete);
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
			$newItem = isset($aParameter['idSend']) ? Color::find($aParameter['idSend']) : new Color;
			$newItem->Color = $valueName;
			$newItem->Description= $valueDescription;
			$newItem->IsDelete = false;
			if($newItem->save()){
				return $newItem;
			}
		}
		return '0';
	}
}
