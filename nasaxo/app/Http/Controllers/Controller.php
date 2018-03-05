<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Users as Users;
use App\Picture as Picture;

use Cookie;
class Controller extends BaseController{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  protected static $imageDefault = "accounts/account.png";
  // thực hiện random
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
    // check account with roles
  public function isLogin($role=[]){
    $account = null;
    if(cookie::get('accountHome')!=null){
      $accountCookie = cookie::get('accountHome');
      $savedAccount = json_decode($accountCookie, true);
      $account=Users::where([['IsDelete','=',false]])->find($savedAccount['id']);
      $roleUser=$account->Roles()->get();
      if(count($roleUser)>0 && in_array($roleUser[0]->id,$role)){
       return '1';
     }else {
      return '0';
    }
  }
  return '0';
}
// kiểm tra login
public function checklogin(){
  $role=array_merge($_POST, $_GET);
  $account = null;
  if(cookie::get('accountHome')!=null){
    $accountCookie = cookie::get('accountHome');
    $savedAccount = json_decode($accountCookie, true);
    $account=Users::where([['IsDelete','=',false]])->find($savedAccount['id']);
    $roleUser=$account->Roles()->get();
    if(count($roleUser)>0 && in_array($roleUser[0]->id,$role)){
     return '1';
   }else {
    return '0';
  }
}
return '0';
}
// lấy đi login
public function getIdLogin(){
  if(cookie::get('accountHome')!=null){
    $accountCookie = cookie::get('accountHome');
    $savedAccount = json_decode($accountCookie, true);
    return $savedAccount['id'];
  }
  return -1;
}
public function getTypeImage($src){
  $typeString = null;
  $typeInt = exif_imagetype($src);
  switch($typeInt) {
    case IMAGETYPE_GIF:
    $typeString = 'gif';
    break;
    case IMAGETYPE_JPEG:
    $typeString = 'jpeg';
    break;
    case IMAGETYPE_PNG:
    $typeString = 'png';
    break;
    case IMAGETYPE_SWF:
    $typeString = 'swf';
    break;
    case IMAGETYPE_PSD:
    $typeString = 'psd';
    break;
    case IMAGETYPE_ICO:
    $typeString = 'ico';
    break;
    default: 
    $typeString = 'png';
    break;
  }
  return $typeString;
}
public function deleteImage($idPicture,$itemDelete){
   $picture =  Picture::find($idPicture);
   if(isset($picture)){
    if(file_exists(public_path('images/'.$picture->Url))){
       unlink(public_path('images/'.$picture->Url));
    }
    $itemDelete->delete();
    $picture->delete();
   }
}
}
