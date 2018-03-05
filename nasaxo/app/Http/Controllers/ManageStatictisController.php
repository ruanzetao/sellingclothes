<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order as Order;
use App\Users as Users;
use App\Product as Product;

class ManageStatictisController extends Controller
{
	// lấy view
	public function Revenue(){
		return view('ManageStatistics.revenue');
	}
    // lấy view
	public function Bestsell(){
		return view('ManageStatistics.bestsell');
	}
    // lấy view
	public function Customer(){
		return view('ManageStatistics.customer');
	}
	// doanh thu
	public function RevenuePartialStatistics(){
		$listLabel=[];
		$listCountOrder=[];
		$listTotalPrice=[];
		$listOrderGroupByDate=array();
		$aParameter = array_merge($_POST,$_GET);
		if(!isset($aParameter['startDay']) || !isset($aParameter['endDay'])){
			return 'Không tìm thấy dử liệu';
		}
		$startDay = $aParameter['startDay'];
		$endDay = $aParameter['endDay'];
		$listOrder = Order::where([['CreateDate','>=',$startDay],['CreateDate','<=',$endDay],['IsPaied','=',true]])->get();
		// group by with array
		foreach ($listOrder as $value) {
			$key = $value->CreateDate;
			// tính tiền hóa đơn
			$sumprice = 0;
			$listOrderProduct = $value->OrderProduct()->get();
			foreach ($listOrderProduct as $valueOrderDetail) {
				$product = $valueOrderDetail->Product()->get()[0];
				// lấy tiền
				$price=	$product->Prices()->Where([['StartDate','<=',$value->CreateDate],['EndDate','<',$value->CreateDate]])->orWhere([['StartDate','<=',$value->CreateDate],['EndDate','=',null]])->get(); 
				$pricefinal=0;
				// tính toán tiền
				if(count($price)>0){
					$pricefinal  =$price[0]['Price'] -( $price[0]['Price'] * ($price[0]['Discount'] /100));
				}
				$sumprice +=$pricefinal*$valueOrderDetail->Count;
			}
			$promotion = $value->OrderPromotion()->get()[0];
			// tính tiền với khuyến mãi trên hóa đơn
			$sumprice=$sumprice - ($sumprice*$promotion->Discount/100);
			// thêm vào list return nếu chưa tồn tại... có thì không thêm mà cộng thêm
			if (!array_key_exists($key, $listOrderGroupByDate)) {
				$listOrderGroupByDate[$key] = array(
					'countOrder' => '1',
					'totalPrice' => $sumprice,
				);
			} else {
				$listOrderGroupByDate[$key]['countOrder'] = $listOrderGroupByDate[$key]['countOrder'] + 1;
				$listOrderGroupByDate[$key]['totalPrice'] = $listOrderGroupByDate[$key]['totalPrice'] + $sumprice;
			}
		}
		// sắp xếp
		ksort($listOrderGroupByDate);
		// chuyển đổi để vẽ biểu đồ
		foreach ($listOrderGroupByDate as $key => $value) {
			$listLabel[] = $key;
			$listTotalPrice[]=$value['countOrder'];
			$listCountOrder[]=$value['totalPrice'];
		}
		return view('ManageStatistics._partialStatistics',['labels'=>$listLabel,'countOrder'=>$listCountOrder,'totalPrice'=>$listTotalPrice]);
	}
	// bestsell view
	public function BestsellPartialStatistics(){

		$listLabel=[];
		$listCountOrder=[];
		$listTotalPrice=[];
		$listOrderGroupByProduct=array();
		$aParameter = array_merge($_POST,$_GET);
		if(!isset($aParameter['startDay']) || !isset($aParameter['endDay'])){
			return 'Không tìm thấy dử liệu';
		}
		$startDay = $aParameter['startDay'];
		$endDay = $aParameter['endDay'];
		$listOrder = Order::where([['CreateDate','>=',$startDay],['CreateDate','<=',$endDay],['IsPaied','=',true]])->get();
		$listProduct = Product::Where([['IsDelete','=',false]])->get();
		foreach ($listProduct as $valueProduct) {
			if (!array_key_exists($valueProduct->id, $listOrderGroupByProduct)) {
				$arrStr = explode(' ',$valueProduct->Name);
				$valueStr = implode(' ',array_slice($arrStr, 0, 3));
				$listOrderGroupByProduct[$valueProduct->id] = array(
					'nameProduct' =>$valueProduct->id. '-' .$valueStr. '..',
					'countOrder' => 0,
					'totalPrice' => 0,
				);
			}
			// if (!array_key_exists($valueProduct->id, $listOrderGroupByProduct)) {
			// 	$listOrderGroupByProduct[$valueProduct->id] = array(
			// 		'nameProduct' => $valueProduct->Name,
			// 		'countOrder' => 0,
			// 		'totalPrice' => 0,
			// 	);
			// }
		}
		// group by with array
		foreach ($listOrder as $value) {
			$countOrderIn = 1;
			// tính tiền hóa đơn
			// lấy thông tin khuyến mãi trên hóa đơn
			$promotion = $value->OrderPromotion()->get()[0];
			// danh sách sản phẩm trên hóa đơn
			$listOrderProduct = $value->OrderProduct()->get();
			foreach ($listOrderProduct as $valueOrderDetail) {
				$sumprice = 0;
				$product = $valueOrderDetail->Product()->get()[0];
				// lấy tiền
				$price=	$product->Prices()->Where([['StartDate','<=',$value->CreateDate],['EndDate','<',$value->CreateDate]])->orWhere([['StartDate','<=',$value->CreateDate],['EndDate','=',null]])->get(); 
				$pricefinal=0;
				// tính toán tiền
				if(count($price)>0){
					$pricefinal  =$price[0]['Price'] -( $price[0]['Price'] * ($price[0]['Discount'] /100));
				}
				$discount = 0;
				if(isset($promotion->Discount)){
					$discount=$promotion->Discount;
				}
				$priceProductOrder = $pricefinal*$valueOrderDetail->Count;
				$sumprice =($priceProductOrder)- ($priceProductOrder*$discount/100);
				// thêm vào list return nếu chưa tồn tại... có thì không thêm mà cộng thêm
				if (!array_key_exists($valueOrderDetail->ID_Product, $listOrderGroupByProduct)) {
					$listOrderGroupByProduct[$valueOrderDetail->ID_Product] = array(
						'nameProduct' => 'undefined',
						'countOrder' => $countOrderIn,
						'totalPrice' => $sumprice,
					);
				} else {
					$listOrderGroupByProduct[$valueOrderDetail->ID_Product]['countOrder'] = $listOrderGroupByProduct[$valueOrderDetail->ID_Product]['countOrder'] + $countOrderIn;
					$listOrderGroupByProduct[$valueOrderDetail->ID_Product]['totalPrice'] = $listOrderGroupByProduct[$valueOrderDetail->ID_Product]['totalPrice'] + $sumprice;
				}
			}
			
		}
		// sắp xếp
		ksort($listOrderGroupByProduct);
		// chuyển đổi để vẽ biểu đồ
		foreach ($listOrderGroupByProduct as $key => $value) {
			$listLabel[] = $value['nameProduct'];
			$listTotalPrice[]=$value['countOrder'];
			$listCountOrder[]=$value['totalPrice'];
		}
		return view('ManageStatistics._partialStatistics',['labels'=>$listLabel,'countOrder'=>$listCountOrder,'totalPrice'=>$listTotalPrice]);
	}
	// khách hàng mua nhiều nhất
	public function CustomerPartialStatistics(){

		$listLabel=[];
		$listCountOrder=[];
		$listTotalPrice=[];
		$listOrderGroupByDate=array();
		$aParameter = array_merge($_POST,$_GET);
		if(!isset($aParameter['startDay']) || !isset($aParameter['endDay'])){
			return 'Không tìm thấy dử liệu';
		}
		$startDay = $aParameter['startDay'];
		$endDay = $aParameter['endDay'];
		$listOrder = Order::where([['CreateDate','>=',$startDay],['CreateDate','<=',$endDay],['IsPaied','=',true]])->get();
		// group by with array
		foreach ($listOrder as $value) {
			// tính tiền hóa đơn
			$sumprice = 0;
			$listOrderProduct = $value->OrderProduct()->get();
			foreach ($listOrderProduct as $valueOrderDetail) {
				$product = $valueOrderDetail->Product()->get()[0];
				// lấy tiền
				$price=	$product->Prices()->Where([['StartDate','<=',$value->CreateDate],['EndDate','<',$value->CreateDate]])->orWhere([['StartDate','<=',$value->CreateDate],['EndDate','=',null]])->get(); 
				$pricefinal=0;
				// tính toán tiền
				if(count($price)>0){
					$pricefinal  =$price[0]['Price'] -( $price[0]['Price'] * ($price[0]['Discount'] /100));
				}
				$sumprice +=$pricefinal*$valueOrderDetail->Count;
			}
			$promotion = $value->OrderPromotion()->get()[0];
			// tính tiền với khuyến mãi trên hóa đơn
			$sumprice=$sumprice - ($sumprice*$promotion->Discount/100);
			// id khách hàng
			$key = $value->ID_User;
			$userOrder = Users::find($key);
			// thêm vào list return nếu chưa tồn tại... có thì không thêm mà cộng thêm
			if (!array_key_exists($key, $listOrderGroupByDate)) {
				$listOrderGroupByDate[$key] = array(
					'customer' =>$key. '-' .substr($userOrder->Username,0,10).'..',
					'countOrder' => '1',
					'totalPrice' => $sumprice,
				);
			} else {
				$listOrderGroupByDate[$key]['countOrder'] = $listOrderGroupByDate[$key]['countOrder'] + 1;
				$listOrderGroupByDate[$key]['totalPrice'] = $listOrderGroupByDate[$key]['totalPrice'] + $sumprice;
			}
		}
		// sắp xếp
		ksort($listOrderGroupByDate);
		// chuyển đổi để vẽ biểu đồ
		foreach ($listOrderGroupByDate as $key => $value) {
			$listLabel[] = $value['customer'];
			$listTotalPrice[]=$value['countOrder'];
			$listCountOrder[]=$value['totalPrice'];
		}
		return view('ManageStatistics._partialStatistics',['labels'=>$listLabel,'countOrder'=>$listCountOrder,'totalPrice'=>$listTotalPrice]);
	}
}
