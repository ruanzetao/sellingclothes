<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product as Product;
use App\ProductCategory as ProductCategory;
use App\Rating as Rating;
class ProductController extends Controller
{
	public function Get(){
		$aParameter = array_merge($_GET,$_POST);
		$idUser = $this->getIdLogin();
		if(isset($aParameter['id'])){
			$idProduct = $aParameter['id'];
			$rating = Rating::where([['ID_Product','=',$idProduct],['ID_Users','=',$idUser]])->get();
			if(count($rating)>0){
				$pointProduct = $rating[0]->Point;
			}else{
				$rating = Rating::where([['ID_Product','=',$idProduct]])->get();
				$pointProduct=$rating->avg('Point');
			}
			$product = Product::find($idProduct);
			$listCategory = ProductCategory::all();
			return view('ProductDetail.index',['categorys'=>$listCategory,'itemProduct'=>$product,'Point'=>$pointProduct]);
		}
		return redirect('/');
	}
	public function StarProduct(){
		$newRating;
		$idUser = $this->getIdLogin();
		$aParameter = array_merge($_GET,$_POST);
		$idProduct = $aParameter['idProduct'];
		$point = $aParameter['valueStar'];
		$rating = Rating::where([['ID_Product','=',$idProduct],['ID_Users','=',$idUser]])->get();
		if(count($rating)<=0){
			$newRating = new Rating;
			$newRating ->Point = $point;
			$newRating ->ID_Product = $idProduct;
			$newRating ->ID_Users = $idUser;
			$newRating ->IsDelete =false;
		}else{
			$newRating= $rating[0];
			$newRating->Point=$point;
			$newRating->IsDelete=false;
		}
		if($newRating->save()){
			return '1';
		}
		return '0';
	}
}
