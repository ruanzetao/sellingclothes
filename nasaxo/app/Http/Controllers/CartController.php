<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory as ProductCategory;
use App\Users as Users;
use App\OrderProduct as OrderProduct;
use App\Product as Product;
use App\DeliveryPlace as DeliveryPlace;
use App\Order as Order;
use App\Promotion as Promotion;
use Cookie;
use DateTime;
class CartController extends Controller
{
	// goto view cart
    public function Index(){
        if($this->isLogin([1,2])){
            // category 
            $listCategory = ProductCategory::all();
            $idUser= $this->getIdLogin();
            $listCartProduct = OrderProduct::where([['IsDelete','=',false],['ID_User','=',$idUser],['IsInCart','=',1]])->get();
            return view('Cart.index',['categorys'=>$listCategory,'listCartProduct'=>$listCartProduct]);
        }
        return redirect('/');
    }
    // goto view pay cart
    public function Order(){
        if($this->isLogin([1,2])){
            if(isset($_COOKIE['buyProductList'])){
                $arrProducts = json_decode($_COOKIE['buyProductList'],true);
                // thực hiện thêm vào database
                foreach ($arrProducts as $value) {
                    $detailOrder = OrderProduct::find($value['id']);
                    $detailOrder->ID_Size= $value['size'];
                    $detailOrder->ID_Color= $value['color'];
                    $detailOrder->Count= $value['count'];
                    $detailOrder->save();
                }
            }
            // lấy account
            $idUser=$this->getIdLogin();
            $user=Users::find($idUser);
            // lấy thông tin địa chỉ
            $deliveryplace =$user->DeliveryPlace()->get();
            $listCategory = ProductCategory::all();
            return view('Order.payment_address',['categorys'=>$listCategory,'deliveryPlace'=>$deliveryplace]);
        }
        return redirect('/');
    }
    // goto view invoice cart
    public function Invoice(){
        if($this->isLogin([1,2])){
            $aParameter = array_merge($_GET,$_POST);
            $name = isset($aParameter['name']) ?$aParameter['name'] : "";
            $phone = isset($aParameter['phone']) ?$aParameter['phone'] : "";
            $ward = isset($aParameter['ward']) ?$aParameter['ward'] : "";
            $deveryPlace = isset($aParameter['deveryPlace']) ?$aParameter['deveryPlace'] : "";
            $isDelete = 0;
            $idUser= $this->getIdLogin();
            // get user
            $user=Users::find($idUser);
            if(count($user)>0){
                $deliveryplace = $user->DeliveryPlace()->get();
                // check ton tai dia chi
                if(count($deliveryplace)>0){
                    $deliveryplace[0]->ID_Ward =$ward;
                    $deliveryplace[0]->ReceiveName =$name;
                    $deliveryplace[0]->NumberPhone =$phone;
                    $deliveryplace[0]->DeliveryPlaces =$deveryPlace;
                    $deliveryplace[0]->IsDelete = $isDelete;
                    $deliveryplace[0]->save();
                }else{
                    // them moi
                    $delivery = new DeliveryPlace;
                    $delivery->ID_Ward =$ward;
                    $delivery->ID_User =$idUser;
                    $delivery->ReceiveName =$name;
                    $delivery->NumberPhone =$phone;
                    $delivery->DeliveryPlaces =$deveryPlace;
                    $delivery->IsDelete = $isDelete;
                    $delivery->save();
                }
            }
            // danh sách giỏ hàng
            $listCartProduct = OrderProduct::where([['IsDelete','=',false],['ID_User','=',$idUser],['IsInCart','=',1]])->get();
            // danh sách khuyến mãi
            $dateNow = new DateTime(date('d-m-Y'));
            $listPromoton = Promotion::where([['EndDate','=',null]])->orWhere([['EndDate','>',$dateNow],['StartDate','<',$dateNow]])->get();
            // danh sách category
            $listCategory = ProductCategory::all();
            return view('Order.invoice',['categorys'=>$listCategory,'user'=>$user,'listCartProduct'=>$listCartProduct,'lisPromotion'=>$listPromoton]);
        }
        return redirect('/');

    }
    // delete cart item
    public function Delete(){
        if($this->isLogin([1,2])){
            $aParameter= array_merge($_POST,$_GET);
        // kiểm tra có tham số truyền vào không
            if(isset($aParameter['idOrderProduct'])){
                $item =  OrderProduct::find($aParameter['idOrderProduct']);
                $item->IsDelete = true;
                $item->save();
                return '1';
            }
            return '0';
        }
        return redirect('/');
    }
    // tạo hóa đơn
    public function CreateOrder(){
        if($this->isLogin([1,2])){
            $idUser= $this->getIdLogin();
            $user=Users::find($idUser);
            $deliveryplace = $user->DeliveryPlace()->get();
            if(!(isset($deliveryplace[0]))){
                return '0';
            }
            // thêm hóa đơn
            $order = new Order;
            $order->Description='';
            if(isset($_COOKIE['promotion'])){
                $order->ID_Promotion = unserialize($_COOKIE['promotion']);
                $order->ID_DeliveryPlace =  $deliveryplace[0]->id;
                $order->ID_User = $idUser;
                $order->CreateDate = date('Y-m-d');
                $order->ConfirmDate = null;
                $order->IsPaied = 0;
                $order->IsDelivered = 0;
                $order->IsDelete = 0;
                if($order->save()){
                // danh sách giỏ hàng
                    $listCartProduct = OrderProduct::where([['IsDelete','=',false],['ID_User','=',$idUser],['IsInCart','=',1]])->get();
                    foreach ($listCartProduct as $valueCart) {
                        $valueCart->IsInCart = 0;
                        $valueCart->ID_Order =  $order->id;
                        $valueCart->save();
                    }
                    return '1';
                }
            }
        }
        return redirect('0');
    }
    // thêm vào giỏ hàng
    public function Add(){
        $arrMethod = array_merge($_GET, $_POST);
        if($this->isLogin([1,2])){
            $idProduct = $arrMethod['productId'];
            $idUser= $this->getIdLogin();
            $idSize =isset($arrMethod['size']) ? $arrMethod['size'] : Product::find($idProduct)->Sizes()->get()[0]->id;
            $idColor = isset($arrMethod['color']) ? $arrMethod['color'] : Product::find($idProduct)->Colors()->get()[0]->id;
            $isInCart = 1;
            $description='';
            $cartProductOld=OrderProduct::where([['ID_Product','=',$idProduct],['ID_User','=',$idUser],['IsInCart','=',1]])->get();
            if(count($cartProductOld)>0){
                $cartProductOld[0]->Count = $cartProductOld[0]->IsDelete == true ? 1 : ++$cartProductOld[0]->Count;
                $cartProductOld[0]->IsDelete = false;
                $cartProductOld[0]->save();
            }else{
                $cartProduct = new OrderProduct;
                $cartProduct->ID_Order=null;
                $cartProduct->ID_Product = $idProduct;
                $cartProduct->ID_User = $idUser;
                $cartProduct->ID_Size=$idSize;
                $cartProduct->ID_Color=$idColor;
                $cartProduct->Count = 1;
                $cartProduct->IsDelete = 0;
                $cartProduct->IsInCart =$isInCart;
                $cartProduct->Description =$description;
                $cartProduct->save();
            }
            return '1';
        }
        return '0';

    }
}
