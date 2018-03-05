<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promotion as Promotion;
use App\PromotionPicture as PromotionPicture;
use App\Picture as Picture;
class ManagePromotionController extends Controller
{
	// lấy view promotion
	public function GetPromotion(){
		return view('ManagePromotion.index');
	}
	public function actionSearch(){
		$aRes = [];
		$aParameter = array_merge($_POST,$_GET);
		$valueSearch =isset($aParameter['valueSearch'])? $aParameter['valueSearch'] : "";
		$listPromotion = Promotion::where([['IsDelete','=',false],['Name','like','%'. $valueSearch .'%']])->get();
		foreach ($listPromotion as $key => $value) {
			$aRes[$key]['id'] = $value->id;
			$aRes[$key]['Description'] = $value->Description;
			$aRes[$key]['Name'] = $value->Name;
			$aRes[$key]['Discount'] = $value->Discount;
			$aRes[$key]['BasePurchase'] = $value->BasePurchase;
			$aRes[$key]['StartDate'] = $value->StartDate;
			$aRes[$key]['EndDate'] = $value->EndDate;
			$picture = $value->Pictures()->get();
			$aRes[$key]['Picture'] = isset($picture[0])? $picture[0]->Url : "";

		}
		return view('ManagePromotion._search',['listPromotion'=>$aRes]);
	}	
	public function actionDelete(){
		$aParameter = array_merge($_POST,$_GET);
		$idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
		$item = Promotion::find($idDelete);
		if(isset($item)){
			$item->IsDelete = true;
			if($item->save())
				return '1';
		}
		return '0';
	}	
	public function actionAdd(){
		$aParameter = array_merge($_POST,$_GET);
		$imgPromotion = isset($aParameter['imgPromotion'])? $aParameter['imgPromotion']:"";
		$startDate = isset($aParameter['startDate'])? $aParameter['startDate']:date('Y-m-d');
		$endDate = isset($aParameter['endDate'])? $aParameter['endDate']:date('Y-m-d');
		$promotionName = isset($aParameter['promotionName'])? $aParameter['promotionName']:'';
		$basePureChase = isset($aParameter['basePureChase'])? $aParameter['basePureChase']:0;
		$promotionDiscount = isset($aParameter['promotionDiscount'])? $aParameter['promotionDiscount']:0;
		$valueDescription = isset($aParameter['valueDescription'])? $aParameter['valueDescription']:"";

		$newItem = isset($aParameter['idSend']) ? Promotion::find($aParameter['idSend']) : new Promotion;
		$newItem->Description = $valueDescription;
		$newItem->Name= $promotionName;
		$newItem->Discount= $promotionDiscount;
		$newItem->BasePurchase= $basePureChase;
		$newItem->StartDate= trim($startDate)=='' ? date('Y-m-d') : $startDate;
		$newItem->EndDate= trim($endDate)=='' ? date('Y-m-d') : $endDate;
		$newItem->IsDelete = false;
		$newItem->save();
		// delete picture
		$listDelete = PromotionPicture::where([['ID_Promotion','=',$newItem->id]])->get();
		// insert picture
		$extention = $this->getTypeImage($imgPromotion);
		$idMaxImage = Picture::max('id');
		$imageName = ++$idMaxImage. '.' . $extention;
		$url =  'public/images/promotions'.'/'. $imageName;
		$picture = new Picture;
		$picture->Url = 'promotions/'.$imageName;
		$picture->IsDelete = false;
		// thêm userpicture
		$promotionPicture = new PromotionPicture;
		$promotionPicture->ID_Promotion = $newItem->id;
		$promotionPicture->ID_Picture = $idMaxImage;
		$promotionPicture->IsDelete = false;
		file_put_contents($url,file_get_contents($imgPromotion));
		$aRes = [];
		if($picture->save() && $promotionPicture->save()){
			$aRes['id'] = $newItem->id;
			$aRes['EndDate'] = $newItem->EndDate;
			$aRes['Description'] = $newItem->Description;
			$aRes['StartDate'] = $newItem->StartDate;
			$aRes['Name'] = $newItem->Name;
			$aRes['Discount'] = $newItem->Discount;
			$aRes['BasePurchase'] = $newItem->BasePurchase;
			$aRes['Picture'] = $picture->Url;
			foreach ($listDelete as $valueDelete) {
				$this->deleteImage($valueDelete->ID_Picture,$valueDelete);
			}
			return $aRes;
		}
		return '0';
	}	
}
