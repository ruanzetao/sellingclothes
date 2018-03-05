<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City as City;
use App\District as District;
use App\Ward as Ward;
use Response;
class ManageAddressController extends Controller
{
    // lấy danh sách city autocomplete
    public function GetCitys(){
        $aMerge = array_merge($_GET, $_POST);
        $term = $aMerge['term'];
        $aReturn=[];
        $mCity = City::where([['Name','LIKE','%'.$term.'%'],['IsDelete','=',false]])->get();
        foreach ($mCity as $value) {
            $aReturn[] = array('id'=>$value->id,'value'=>$value->Name);
        }
        return Response::json($aReturn);
    }
    // lấy danh sách districts autocomplete
    public function GetDistrictsByIdCity(){
        $aMerge = array_merge($_GET, $_POST);
        // tên districts
        $term = $aMerge['term'];
        // id city
        $idCity = $aMerge['idCity'];
        $aReturn=[];
        $mCity = District::where([['Name','LIKE','%'.$term.'%'],['IsDelete','=',false],['ID_City','=', $idCity]])->get();
        foreach ($mCity as $value) {
            $aReturn[] = array('id'=>$value->id,'value'=>$value->Name);
        }
        return Response::json($aReturn);
    }
    // lấy danh sách districts autocomplete
    public function GetWardsByIdDistrict(){
        $aMerge = array_merge($_GET, $_POST);
        // tên districts
        $term = $aMerge['term'];
        // id city
        $idDistrict = $aMerge['idDistrict'];
        $aReturn=[];
        $mCity = Ward::where([['Name','LIKE','%'.$term.'%'],['IsDelete','=',false],['ID_District','=', $idDistrict]])->get();
        foreach ($mCity as $value) {
            $aReturn[] = array('id'=>$value->id,'value'=>$value->Name);
        }
        return Response::json($aReturn);
    }
	// trả lại view Districts
    public function GetDistrictView(){
        return view('ManageAddress.district.index');
    }
	// trả lại view City
    public function GetCityView(){
        return view('ManageAddress.city.index');
    } 
    public function actionSearchCity(){
        $aParameter = array_merge($_POST,$_GET);
        $valueSearch =isset($aParameter['valueSearch'])? $aParameter['valueSearch'] : "";
        $listCity = City::where([['IsDelete','=',false],['Name','like','%'. $valueSearch .'%']])->get();
        return view('ManageAddress.city._search',['listCity'=>$listCity]);
    } 
    public function actionSearchDistrict(){
        $aParameter = array_merge($_POST,$_GET);
        $valueSearch =isset($aParameter['valueSearch'])? $aParameter['valueSearch'] : "";
        $listDistrict = District::where([['IsDelete','=',false],['Name','like','%'. $valueSearch .'%']])->get();
        $listRes = [];
        foreach ($listDistrict as $key => $value) {
            $listRes[$key]['id'] = $value->id;
            $listRes[$key]['Name'] = $value->Name;
            $listRes[$key]['Description'] = $value->Description;
            $city = City::find($value->ID_City);
            $listRes[$key]['idCity'] = $value->ID_City;
            $listRes[$key]['nameCity'] = isset($city)  ? $city->Name :"";
        }
        return view('ManageAddress.district._search',['listDistrict'=>$listRes]);
    } 
    public function actionSearchWard(){
        $aParameter = array_merge($_POST,$_GET);
        $valueSearch =isset($aParameter['valueSearch'])? $aParameter['valueSearch'] : "";
        $listWard = Ward::where([['IsDelete','=',false],['Name','like','%'. $valueSearch .'%']])->get();
        $listRes = [];
        foreach ($listWard as $key => $value) {
            $listRes[$key]['id'] = $value->id;
            $listRes[$key]['Name'] = $value->Name;
            $listRes[$key]['Description'] = $value->Description;
            $District = District::find($value->ID_District);
            $listRes[$key]['idDistrict'] = $value->ID_District;
            $listRes[$key]['nameDistrict'] = isset($District)  ? $District->Name :'';
            $idCity  = isset($District) ? $District->ID_City : '';
            $listRes[$key]['idCity'] = $idCity;
            $city = City::find($idCity);
            $listRes[$key]['nameCity'] = isset($city)  ? $city->Name :'';
        }
        return view('ManageAddress.ward._search',['listWard'=>$listRes]);
    } 
    public function actionDeleteCity(){
        $aParameter = array_merge($_POST,$_GET);
        $idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
        $item = City::find($idDelete);
        if(isset($item)){
            $item->IsDelete = true;
            if($item->save())
                return '1';
        }
        return '0';
    } 
    public function actionDeleteWard(){
        $aParameter = array_merge($_POST,$_GET);
        $idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
        $item = Ward::find($idDelete);
        if(isset($item)){
            $item->IsDelete = true;
            if($item->save())
                return '1';
        }
        return '0';
    } 
    public function actionDeleteDistrict(){
        $aParameter = array_merge($_POST,$_GET);
        $idDelete =isset($aParameter['idSend'])? $aParameter['idSend'] : "";
        $item = District::find($idDelete);
        if(isset($item)){
            $item->IsDelete = true;
            if($item->save())
                return '1';
        }
        return '0';
    } 
    public function actionAddCity(){
        $aParameter = array_merge($_POST,$_GET);
        if(isset($aParameter['valueName'])){
            $valueName = $aParameter['valueName'];
            $valueDescription = isset($aParameter['valueDescription'])? $aParameter['valueDescription']:"";
            $newItem = isset($aParameter['idSend']) ? City::find($aParameter['idSend']) : new City;
            $newItem->Name = $valueName;
            $newItem->Description= $valueDescription;
            $newItem->IsDelete = false;
            if($newItem->save()){
                return $newItem;
            }
        }
        return '0';
    } 
    public function actionAddDistrict(){
        $aParameter = array_merge($_POST,$_GET);
        if(isset($aParameter['valueName'])){
            $valueName = $aParameter['valueName'];
            $valueDescription = isset($aParameter['valueDescription'])? $aParameter['valueDescription']:"";
            $valueIdCity = isset($aParameter['idCity'])? $aParameter['idCity']:1;
            $newItem = isset($aParameter['idSend']) ? District::find($aParameter['idSend']) : new District;
            $newItem->Name = $valueName;
            $newItem->ID_City = $valueIdCity;
            $newItem->Description= $valueDescription;
            $newItem->IsDelete = false;
            $valueRes = [];
            if($newItem->save()){
                $valueRes['id'] = $newItem->id;
                $valueRes['Name'] = $newItem->Name;
                $valueRes['Description'] = $newItem->Description;
                $city = City::find($newItem->ID_City);
                $valueRes['idCity'] = $newItem->ID_City;
                $valueRes['nameCity'] = isset($city)  ? $city->Name :"";
                return $valueRes;
            }
        }
        return '0';
    } 
    public function actionAddWard(){
        $aParameter = array_merge($_POST,$_GET);
        if(isset($aParameter['valueName'])){
            $valueName = $aParameter['valueName'];
            $valueDescription = isset($aParameter['valueDescription'])? $aParameter['valueDescription']:"";
            $valueIdCity = isset($aParameter['idCity'])? $aParameter['idCity']:1;
            $newItem = isset($aParameter['idSend']) ? Ward::find($aParameter['idSend']) : new Ward;
            $newItem->Name = $valueName;
            $newItem->ID_District = $valueIdCity;
            $newItem->Description= $valueDescription;
            $newItem->IsDelete = false;
            $valueRes = [];
            if($newItem->save()){
                $valueRes['id'] = $newItem->id;
                $valueRes['Name'] = $newItem->Name;
                $valueRes['Description'] = $newItem->Description;
                $District = District::find($newItem->ID_District);
                $valueRes['idDistrict'] = $newItem->ID_District;
                $valueRes['nameDistrict'] = isset($District)  ? $District->Name :'';
                $idCity  = isset($District) ? $District->ID_City : '';
                $valueRes['idCity'] = $idCity;
                $city = City::find($idCity);
                $valueRes['nameCity'] = isset($city)  ? $city->Name :'';
                return $valueRes;
            }
        }
        return '0';
    } 
	// trả lại view Wards
    public function GetWardView(){
     return view('ManageAddress.ward.index');
 }
}
