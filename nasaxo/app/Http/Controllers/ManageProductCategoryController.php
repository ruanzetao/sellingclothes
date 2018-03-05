<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory as ProductCategory;
use App\Product as Product;
use Response;
class ManageProductCategoryController extends Controller
{
    public function GetProductCategorys(){
    	return view('ManageProductCategory.index');
    }
    // *Create by NGuyễn Hoàng Nam
    // *Date: 14/12/2017
    // *Description: Search
    public function actionSearch(){
        $aParameter = array_merge($_POST,$_GET);
        $valueSearch =isset($aParameter['valueSearch'])? $aParameter['valueSearch'] : "";
        $listCategory = ProductCategory::where([['IsDelete','=',false],['Name','like','%'. $valueSearch .'%']])->get();
        return view('ManageProductCategory._search',['listCategory'=>$listCategory]);
    }
    // *Create by NGuyễn Hoàng Nam
    // *Date: 16/12/2017
    // *Description: get list category
    public function actionGetList(){
        $valueSearch = isset($_GET['term']) ? $_GET['term']: "";
    	$listCategory = ProductCategory::where([['IsDelete','=',false],['Name','like','%'.$valueSearch.'%']])->get();
        $aReturn=[];
        foreach ($listCategory as $value) {
            $aReturn[] = array('id'=>$value->id,'value'=>$value->Name);
        }
        return Response::json($aReturn);
    }
    // *Create by NGuyễn Hoàng Nam
    // *Date: 14/12/2017
    // *Description: Delete
    public function actionDelete(){
        $aParameter = array_merge($_POST,$_GET);
        $idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
        $item = ProductCategory::find($idDelete);
        $listProduct  = Product::where([['ID_ProductCategory','=', $idDelete]])->get();
        foreach ($listProduct as $key => $value) {
            $value->IsDelete= true;
            $value->save();
        }
        if(isset($item)){
            $item->IsDelete = true;
            if($item->save())
                return '1';
        }
        return '0';
    }
    // *Create by NGuyễn Hoàng Nam
    // *Date: 15/12/2017
    // *Description: add item
    public function actionAdd(){
        $aParameter = array_merge($_POST,$_GET);
        if(isset($aParameter['valueName'])){
            $valueName = $aParameter['valueName'];
            $valueDescription = isset($aParameter['valueDescription'])? $aParameter['valueDescription']:"";
            $newItem = new ProductCategory;
            $newItem->Name = $valueName;
            $newItem->Description= $valueDescription;
            $newItem->IsDelete = false;
            if($newItem->save()){
                return $newItem;
            }
        }
        return '0';
    }
    // *Create by NGuyễn Hoàng Nam
    // *Date: 15/12/2017
    // *Description: update item
    public function actionUpdate(){
        $aParameter = array_merge($_POST,$_GET);
        if(isset($aParameter['idSend']) && isset($aParameter['valueName'])){
            $id = $aParameter['idSend'];
            $valueName = $aParameter['valueName'];
            $valueDescription = isset($aParameter['valueDescription'])? $aParameter['valueDescription']:"";
            $updateItem = ProductCategory::find($id);
            if(isset($updateItem)){
                $updateItem->Name = $valueName;
                $updateItem->Description= $valueDescription;
                $updateItem->IsDelete = false;
                if($updateItem->save()){
                    return $updateItem;
                }
            }
        }
        return '0';
    }
}
