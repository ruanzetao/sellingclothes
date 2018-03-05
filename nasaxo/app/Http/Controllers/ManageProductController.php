<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product as Product;
use App\ProductPrice as ProductPrice;
use App\ProductColor as ProductColor;
use App\ProductSize as ProductSize;
use App\Picture as Picture;
use App\ProductPicture as ProductPicture;
class ManageProductController extends Controller
{
	// get view product
	public function GetProducts(){
		return view('ManageProduct.index');
	}
    // get view product
	public function actionSearch(){
		$aParameter = array_merge($_POST, $_GET);
		$valueSearch = isset($aParameter['valueSearch']) ? $aParameter['valueSearch'] : "";
		$listProduct = Product::where([['IsDelete','=',false],['Name','like','%'.$valueSearch.'%']])->get();
		return view('ManageProduct._search',['listProduct'=>$listProduct]);
	}
	// get view product
	public function actionDelete(){
		$aParameter = array_merge($_POST,$_GET);
		$idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
		$item = Product::find($idDelete);
		if(isset($item)){
			$item->IsDelete = true;
			if($item->save())
				return '1';
		}
		return '0';
	}
	public function actionGetPrices(){
		$aParameter = array_merge($_POST,$_GET);
		$idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
		$item = Product::find($idDelete);
		if(isset($item)){
			$listPrice = $item->Prices()->get();
			$aResult=[];
			foreach ($listPrice as $key => $value) {
				$aResult[] = array(
					'data'=>array(	'STT' =>$key+1 ,
						'StartDay'=> $value->StartDate,
						'EndDay'=> $value->EndDate==null ?"":$value->EndDate,
						'Price'=> $value->Price .' VNĐ',
						'Discount'=>$value->Discount. '%'
					),
					'flag'=>0
				);
			}
			return json_encode($aResult);
		}
		return '0';
	}
	public function actionGetItem(){
		$aParameter = array_merge($_POST,$_GET);
		$idProduct =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
		$item = Product::find($idProduct);
		$aResult=[];
		if(isset($item)){
			$aResult['idCategory'] = $item->ID_ProductCategory;
			$aResult['nameCategory'] = $item->ProductCategory()->get()[0]->Name;
			$aResult['nameProduct'] = $item->Name;
			$stringColors = '';
			$stringSizes = '';
			$stringPictures = '';
			// thêm danh sách Color
			$listColor = $item->Colors([['IsDelete','=',false]])->get();
			foreach ($listColor as $key => $value) {
				$stringColors .= '<div class="itemDivDetail"><span data-color="'. $value->id .'" style="background-color:#'. $value->Color .';" class="itemDetail" > </span><span style="top: -32px;" title="Bỏ màu" class="removeItem"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></div>';
			}
			$aResult['listColor'] = $stringColors;
			// thêm danh sách size
			$listSize = $item->Sizes([['IsDelete','=',false]])->get();
			foreach ($listSize as $key => $value) {
				$stringSizes .= '<div class="itemDivDetail"><span data-size="'. $value->id .'" class="itemDetail" >'.$value->Sizes .'</span><span title="Bỏ kích thước" class="removeItem"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></div>';
			}
			$aResult['listSize'] = $stringSizes;
			$valuePrice = $item->Prices()->whereNull('EndDate')->get()[0];
			$aResult['price'] = $valuePrice->Price;
			$aResult['discount'] = $valuePrice->Discount;
			// thêm danh sách hình ảnh
			$listPicture = $item->Pictures([['IsDelete','=',false]])->get();
			foreach ($listPicture as $key => $value) {
				$stringPictures .= '<div class="item-picture"><img class="img-product-edit" src="' .url('public/images').'/'. $value->Url . '"/><span title="Bỏ hình ảnh" class="removeImg"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></div>';
			}
			$aResult['pictures'] = $stringPictures;
			// hình mô tả
			$aResult['Description'] = $item->Description;
			return $aResult;
		}
		return '0';
	}
	public function actionadd(){
		$itemResult = [];
		$aParameter = array_merge($_POST,$_GET);
		$idCategory = isset($aParameter['idCategory']) ? $aParameter['idCategory'] : 1;
		$nameProduct =isset($aParameter['nameProduct']) ? $aParameter['nameProduct'] : 'default';
		$Description =isset($aParameter['Description']) ? $aParameter['Description'] : '';
		// giá
		$intPrice = isset($aParameter['price']) ? $aParameter['price'] : 0;
		$intDiscount = isset($aParameter['discount']) ? $aParameter['discount'] : 0;
		// danh sách màu
		$listColor =isset($aParameter['listColor']) ? $aParameter['listColor'] : [];
		// size
		$listSize =  isset($aParameter['listSize']) ? $aParameter['listSize'] : [];
		// danh sách hình ảnh
		$listPicture = isset($aParameter['pictures']) ? $aParameter['pictures'] : [];
		// sản phẩm
		$newProduct;
		if(isset($aParameter['idProduct'])){
			$newProduct = Product::find($aParameter['idProduct']);
		}else{
			$newProduct  = new Product;
		}
		$newProduct->ID_ProductCategory = $idCategory;
		$newProduct->Name = $nameProduct;
		$newProduct->Description = $Description;
		$newProduct->IsDelete = 0;
		$saveProduct = $newProduct->save();

		$itemResult['id'] = $newProduct->id;
		$itemResult['Name'] = $newProduct->Name;
		$itemResult['Description'] = $newProduct->Description;
		$itemResult['category'] = $newProduct->ProductCategory()->get()[0]->Name;
		//  giá
		$priceOle = ProductPrice::where([['IsDelete','=',false],['ID_Product','=',$newProduct->id]])->whereNull('EndDate')->get();
		foreach ($priceOle as $key => $value) {
			$value->EndDate = date('Y-m-d');
			$value->save();
		}
		$priceProduct  = new ProductPrice;
		$priceProduct->Price = $intPrice;
		$priceProduct->StartDate = date('Y-m-d');
		$priceProduct->EndDate = null;
		$priceProduct->IsDelete = 0;
		$priceProduct->ID_Product =	$newProduct->id;
		$priceProduct->Discount =	$intDiscount;
		$savePrce=$priceProduct->save();
		$itemResult['price'] = $newProduct->Prices()->whereNull('EndDate')->get()[0]->Price;
		// detail màu sắt
		// delete
		ProductColor::where([['ID_Product','=',$newProduct->id]])->delete();
		$saveColor = true;
		foreach ($listColor as $key => $value) {
			$colorDetail = new ProductColor;
			$colorDetail->ID_Product = $newProduct->id;
			$colorDetail->ID_Color = $value;
			$colorDetail->IsDelete = false;
			if(!$colorDetail->save()){
				$saveColor = false;
			}
		}
		$saveSize= true;
		// delete
		ProductSize::where([['ID_Product','=',$newProduct->id]])->delete();
		// thêm danh sách size
		foreach ($listSize as $key => $value) {
			$sizeDetail = new ProductSize;
			$sizeDetail->ID_Product =  $newProduct->id;
			$sizeDetail->ID_Size = 	$value;
			$sizeDetail->IsDelete = false;
			if(!$sizeDetail->save()){
				$saveSize = false;
			}
		}
		// Thêm danh sách hình ảnh
		$savePicture = true;
		$itemResult['picture'] = '';
		// delete user picture
		$listDelete = ProductPicture::where([['ID_Product','=',$newProduct->id]])->get();
		foreach ($listPicture as $key => $value) {
			// insert picture
			$extention = $this->getTypeImage($value);
			$idMaxImage = Picture::max('id');
			$imageName = ++$idMaxImage. '.' . $extention;
			$url =  'public/images/products'.'/'. $imageName;
			$picture = new Picture;
			$picture->Url = 'products/'.$imageName;
			$picture->IsDelete = false;
			if(!$picture->save()){
				$savePicture = false;
			}
			// thêm product picture
			$ProductPicture = new ProductPicture;
			$ProductPicture->ID_Product = $newProduct->id;
			$ProductPicture->ID_Picture = $idMaxImage;
			$ProductPicture->IsDelete = false;
			if(!$ProductPicture->save()){
				$savePicture = false;
			}
			file_put_contents($url,file_get_contents($value));
			$itemResult['picture'] .= '<img class="img-product" src="'.url("public/images/").'/'. $picture->Url .'">';
		}
		if($saveProduct && $savePrce && $saveColor && $saveSize && $savePicture){
			foreach ($listDelete as $valueDelete) {
				$this->deleteImage($valueDelete->ID_Picture,$valueDelete);
			}
			return $itemResult;
		}
		return '0';
	}
}
