<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// khai báo product model
use App\Product as Product;
use App\ProductCategory as ProductCategory;
use App\Promotion as Promotion;
class HomeController extends Controller
{
	// số record products hiển thị mật định
	static protected $_numberRecord = 12;
	// default home
	public function Index(){
		$arrMethodIndex= array_merge($_GET, $_POST);
		// danh sách biến view
		$param = array(
			'pageList' =>isset($arrMethodIndex['pageList']) ? $arrMethodIndex['pageList'] : 0 ,
			'numberRecord' =>isset($arrMethodIndex['numberRecord']) ? $arrMethodIndex['numberRecord'] : HomeController::$_numberRecord,
			'productCategory' =>isset($arrMethodIndex['productCategory']) ? $arrMethodIndex['productCategory'] : '' ,
			'nameProduct' =>isset($arrMethodIndex['nameProduct']) ? $arrMethodIndex['nameProduct'] : '' ,
			'bestSeller' =>isset($arrMethodIndex['bestSeller']) ? $arrMethodIndex['bestSeller'] : '' ,
		);
    	// lấy dánh Promotion::all() discount
		$discount=Promotion::where([['IsDelete','=',0]])->get();
		// view discounts
		$dataViewDiscount = view('Home._PromotionLayout',['promotions'=>$discount]);
		// category 
		$listCategory = ProductCategory::where([['IsDelete','=',0]])->get();
		// view products
		$dataViewProducts = HomeController::GetViewProducts(0);
		return view('Home.Home',['param'=>$param,'_home'=>true,'categorys'=>$listCategory,'products'=>$dataViewProducts,'discounts'=>$dataViewDiscount]);
	}
	//  lấy danh sách products hiển thi lên views
	public function GetViewProducts($isDelete=0){
		$arrMethod= array_merge($_GET,$_POST);
		// các tham số truyền vào
		// required
		$arrRequired=array();
		array_push($arrRequired,array( 'IsDelete','=',$isDelete ));
		//  trang thứ
		$pageList = isset($arrMethod['pageList']) ? $arrMethod['pageList'] : 0;
		// Số lượng hiển thị
		$numberRecord = isset($arrMethod['numberRecord']) ? $arrMethod['numberRecord'] : HomeController::$_numberRecord;		
		// nhóm sản phẩm
		$productCategory = isset($arrMethod['productCategory']) ? $arrMethod['productCategory'] : null;
		// add category to reqired
		if($productCategory!=null && $productCategory!="" && !empty($productCategory)){
			array_push($arrRequired,array( 'ID_ProductCategory','=',$productCategory));
		}
		// tên sản phẩm
		$nameProduct = isset($arrMethod['nameProduct']) ? $arrMethod['nameProduct'] : null;
		// add name to reqired
		if($nameProduct !=null && $nameProduct !="" && !empty($nameProduct)){
			array_push($arrRequired,array( 'Name','LIKE','%'.$nameProduct .'%' ));
		}
		// sap xep dnah sach ban chay nhat
		$bestSeller=isset($arrMethod['bestSeller']) ? $arrMethod['bestSeller'] : '0' ;
		// hiển thị nút xem nhiều
		$seeMore = true;
		//  lấy danh sách product
		$products = HomeController::GetProduct($pageList*$numberRecord,$numberRecord,$arrRequired,$bestSeller);
		// tính toán có remove nút seemore không?
		if(($pageList+1)*$numberRecord >=count(Product::where($arrRequired)->get())){
			$seeMore = false;
		}
		// trả về danh sách product
		return view('Home._ProductsLayout',['products'=>$products,'seeMore'=>$seeMore]);
	}
    // lấy danh sách product theo yêu cầu
	public function GetProduct($skip=0,$take=12,$where=[],$bestSeller=0){
		// set default
		$skip=$skip == null ? 0: $skip;
		$where=$where==null? [] : $where;
		if($bestSeller!=0){

			// lấy danh sách product join order detail
			$valueJoinOrderDetail = Product::where($where)->with('OderDetails')->get();
			// Sort desc
			$result=$valueJoinOrderDetail->sortByDesc(function($element){
				if($element->OderDetails)
				{
					$sum = 0;
					foreach ($element->OderDetails as $value) {
						if($value->IsInCart==false){
							$sum+= $value->Count;
						}
					}
				}
				return $sum;
			});
			return $take == null ? $result->slice($skip) : $result->slice($skip)->take($take);
		}else{
    		// return product items
			return $take == null ? Product::where($where)->skip($skip)->get() : Product::where($where)->skip($skip)->take($take)->get();
		}
	}
}
