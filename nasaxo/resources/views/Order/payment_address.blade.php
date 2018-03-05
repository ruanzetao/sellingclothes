@extends('Order.index')
@section('link')
@parent
<link rel="stylesheet" type="text/css" href="{!! url('public/css/Order/payment_address.css') !!}">
@stop
@section('content-order')
<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-push-2">
			<div  class="address">
				<form action="{!! url('cart/invoice') !!}" enctype="multipart/form-data" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="Name">Họ tên người nhận</label>
						<input type="text" class="form-control" id="Name" name="name" placeholder="Nhập họ tên" value="<?php echo isset($deliveryPlace[0]->ReceiveName) ? $deliveryPlace[0]->ReceiveName : ""; ?>" required>
					</div>
					<div class="form-group">
						<label for="SDT">Số điện thoại</label>
						<input type="text" class="form-control" id="SĐT" name="phone" placeholder="Nhập SĐT" value="<?php echo isset($deliveryPlace[0]->NumberPhone) ? $deliveryPlace[0]->NumberPhone : ""; ?>" required>
					</div>
					<?php 	$ward = isset($deliveryPlace[0]->ID_Ward) ? $deliveryPlace[0]->Ward()->get()[0] : null; 
							$district =  isset($ward->ID_District) ? $ward->District()->get()[0] : null; 
							$city =  isset($district->ID_City) ? $district->City()->get()[0] : null; 
						?>
					<div class="form-group">
						<label for="Tinh">Tỉnh/Thành phố</label>
						<input type="text" class="hidden" id="cityControl" name="city" value="<?php if($city != null){ echo $city->id; } ?>"  required>
						<input type="text" class="form-control" id="city" value="<?php if($city!=null){ echo $city->Name; } ?>" placeholder="nhập tên tỉnh/thành phố">
					</div>  
					<div class="form-group">
						<label for="Quan">Quận huyện/phường xã</label>
						<input type="text" class="hidden" id="districtControl" name="district" value="<?php if($district != null){ echo $district->id; } ?>"  required>
						<input type="text" class="form-control" id="district" value="<?php if($district!=null){ echo $district->Name; } ?>" placeholder="Nhập tên quận huyện hoặc phường xã
						">
					</div>  
					<div class="form-group">
						<label for="ward">Khu vực</label>
						<!-- ward of delivery -->
						<input type="text" class="hidden" id="wardControl" name="ward" value="<?php if($ward != null){ echo $ward->id; } ?>" required>
						<input type="text" class="form-control" id="ward" value="<?php if($ward!=null){ echo $ward->Name; } ?>" placeholder="Nhập địa chỉ
						">
					</div>   
					<div class="form-group">
						<!-- địa chỉ -->
						<label for="DiaChi">Địa chỉ</label>
						<input type="text" class="form-control" id="DiaChi" name="deveryPlace" value="<?php echo isset($deliveryPlace[0]->DeliveryPlaces) ? $deliveryPlace[0]->DeliveryPlaces : ""; ?>" placeholder="Nhập địa chỉ
						" required>
					</div>   
					<button id="btnSubmitAddress" type="submit" class="btn btn-info pull-right">Tiếp tục</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
@parent
<script type="text/javascript" src="{!! url('public/js/Order/payment_address.js') !!}"></script>
@stop