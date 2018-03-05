@extends('Order.index')
@section('link')
@parent
<link rel="stylesheet" type="text/css" href="{!! url('public/css/Order/invoice.css') !!}">
@stop
@section('content-order')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="time">
				<h3>Thời gian giao hàng dự kiến</h3>
				<!-- 7 ngay sau kể từ thời điểm hiện tại -->
				<span class= "fa fa-bicycle">  Giao hàng tiêu chuẩn dự kiến trước ngày <?php $date = date('d-m-Y'); $dateNext = new DateTime($date); $dateNext->modify('+7 day'); echo $dateNext->format('d-m-Y'); ?></span>
			</div>
		</div>
		<div class="col-md-6">
			<form class="address-invoice" action="{!! url('cart/order') !!}" method="post">
				{{ csrf_field() }}
				<h3>Địa chỉ giao hàng</h3>
				<button type="submit" class= "btn btn-default pull-right">Chỉnh sửa</button>
				<hr>
				<?php if(isset($user)){
					$deliveryplace = $user->DeliveryPlace()->get();
					?>
					<div class=content>
						<b><?php echo isset($deliveryplace[0]->ReceiveName) ?  $deliveryplace[0]->ReceiveName :""; ?></b>	<br>
						<p>
							<?php echo isset($deliveryplace[0]->DeliveryPlaces) ?  $deliveryplace[0]->DeliveryPlaces :""; ?> <br>	
							<?php echo isset($deliveryplace[0]->NumberPhone) ?  $deliveryplace[0]->NumberPhone :""; ?>
						</p>	
					</div>	
					<?php } ?>

				</form>
			</div>
		</div>
	</div> <!-- end container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="DonHang row">
					<form class=" col-md-12 header" action="{!! url('cart') !!}" method="get">
						<h3 class="donhang">Đơn hàng</h3> 
						<button type="submit" class= "btn btn-default pull-right">Sửa </button>
						<hr class="hr">
					</form>
					<div class="col-md-12 content">
						<!-- danh sách sản phẩm đặt mua -->
						<?php $total = 0;
						if(isset($listCartProduct) && count($listCartProduct)>0){
							foreach ($listCartProduct as $value) { ?>
							<?php 
							$product = $value->Product()->get()[0];
							$price=	$product->Prices()->whereNull('endDate')->get();
							$pricefinal=$price;
							if(count($price)>0){
								$pricefinal  =$price[0]['Price'] -( $price[0]['Price'] * ($price[0]['Discount'] /100));
							}
							$total+= $value->Count * $pricefinal;
							?>
							<div class="col-md-12 product">
								<p class= "col-md-6"><?php  echo isset($product->Name) ? $product->Name: ""; ?></p>
								<span class="col-md-6 col-md-push-2"><?php echo isset($value->Count)? $value->Count: ""; ?> * <?php echo $pricefinal ?> VNĐ</span>
							</div>
							<?php }
						} ?>
						

					</div>

					<div class= "col-md-12 prices">
						<hr class="hr">							
						<div class="col-md-12 Tamtinh">
							<p class="col-md-6">Tạm tính:</p>
							<span class="col-md-6 col-md-push-2""><?php echo $total; ?> VNĐ</span>
						</div>
						<?php
						$discount = 0;
						$promotionID = -1;
						if(isset($lisPromotion) && $lisPromotion!=null && count($lisPromotion)>0){
							$promotions = [];
							foreach ($lisPromotion as $valuePromotion) {
								if($valuePromotion->BasePurchase <= $total){
									$promotions[] = $valuePromotion;
								}
							}
							// lấy promotion lớn nhất
							foreach ($promotions as  $valueApply) {
								if($valueApply->Discount > $discount){
									$discount=$valueApply->Discount;
									$promotionID = $valueApply->id;
								}
							}
						} 
						$DiscountPrice=$total*$discount/100;
						setcookie('promotion',serialize($promotionID));
						?>
						<div class= "col-md-12 PhiVanChuye">
							<p class="col-md-6">Giảm giá trên tổng hóa đơn:</p>
							<span class="col-md-6 col-md-push-2">
								<?php echo $DiscountPrice; ?> VNĐ
							</span>
						</div>
						<hr class="hr">
					</div>

					<div class="col-md-12 TongTien">
						<h3 class="col-md-6">Tổng tiền:</h3>
						<span class="col-md-6 col-md-push-2"><h3><?php echo $total-$DiscountPrice; ?> VNĐ</h3></span>
					</div>

				</div>	<!-- end don hang -->				

			</div>
			<button id="btnBuy" class = "btn btn-danger"> Đặt mua</button>
		</div>

	</div><!--  end container -->
	@stop
	@section('script')
	@parent
	<script type="text/javascript" src="{!! url('public/js/Order/invoice.js') !!}"></script>
	@stop
