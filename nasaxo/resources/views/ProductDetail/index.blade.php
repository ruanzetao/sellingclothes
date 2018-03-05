<?php if(isset($itemProduct)){?>

@extends('_layout')
@section('title')
<?php echo $itemProduct->Name;?>
@stop
@section('link')
@parent
<!-- Swiper css -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/ProductDetail/swiper.min.css') !!}">
<!-- custom file css -->
<link rel="stylesheet" href="{!! url('public/css/ProductDetail/index.css') !!}">
@stop
@section('content')
<div class="container">
	<div class="row">
		<!-- start infomation product-detail -->
		<div class="product-detail col-xs-12 ">
			<div class="col-xs-2 col-md-1 listImgPrduct">
				<?php $listPicture = $itemProduct->Pictures()->get() ?>
				<?php foreach ($listPicture as $valuePicture): ?>
					<img class="img-loader" src="{!! url('public/images') !!}/<?php echo  $valuePicture->Url; ?>">
				<?php endforeach ?>
			</div>
			<!-- start product-detail image -->
			<div class="col-md-3 col-xs-5 product-detail-image">
				<img id="product-detailImgItem" class="zoom-img product-detail-imgItem" src="{!! url('public/images') !!}/<?php echo isset($listPicture[0]) ? $listPicture[0]->Url : 'default.jpg'; ?>" alt="First slide">
			</div>
			<!-- end image -->
			<!-- start infomation and select count - color -->
			<div class="product-detail-infomation col-md-7 col-xs-4">
				<span class="head-product-detail"><?php echo $itemProduct->Name; ?></span>
				<!-- star of product-detail -->
				<div class="product-detail-star">
					<?php $Point = isset($Point) ? $Point : 0; ?>
					<?php if(isset($Point)){
						for ($iPoint=1; $iPoint <= 5 ; $iPoint++) {?>
						<img data-product="<?php echo $itemProduct->id; ?>" data-point='<?php echo $iPoint ?>' src="{!! url('public/images') !!}/<?php echo $iPoint<=$Point ? 'star-on.png' : 'star-off.png' ?>" alt="<?php echo $iPoint ?>">
						<?php
					}
				} ?>
			</div>
			<!-- giá -->
			<div class="field-col">
				<?php $price = $itemProduct->Prices()->whereNull('EndDate')->get()[0]; ?>
				<span class="product-detail-field">Giá: </span>
				<span class="product-detail-price"><?php echo $price->Price - ($price->Price * $price->Discount / 100); ?> VNĐ</span>
				<span class="product-detail-priceOld"><?php echo $price->Price; ?> VNĐ</span>
				<span class="product-detail-discount">-<?php echo $price->Discount; ?> %</span>
			</div>
			<!-- end giá -->
			<!-- start size -->
			<?php $listSize = $itemProduct->Sizes()->where([['ProductSize.IsDelete','=',false]])->get(); 
			if(count($listSize)>0){?>
			<div class="field-col">
				<span class="product-detail-field">Kích thước: </span>
				<!-- danh sách kích thứóc -->
				<span class="radio-inline">
					<!-- lấy danh kích cở -->
					<?php foreach ($listSize as $valueSize) {?>
					<input id="rdSize_<?php echo $itemProduct->id; ?>_<?php echo $valueSize->id; ?>" class="radio-infomation" type="radio" name="rdSize_<?php echo $itemProduct->id; ?>" data-size="<?php echo $valueSize->id; ?>" >
					<label for="rdSize_<?php echo $itemProduct->id; ?>_<?php echo $valueSize->id; ?>">
						<!-- value size -->
						<span style="background: transparent;"><?php echo $valueSize->Sizes ?></span>
					</label>
					<?php } ?>
				</span>
			</div>
			<br>
			<?php } ?>
			<!-- end size -->
			<!-- start color -->
			<?php 
							// lấy danh sách không bị delete
			$colorProduct = $itemProduct->Colors()->where([['ProductColor.IsDelete','=',false]])->get();
			if(count($colorProduct)>0){?>
			<div class="field-col">
				<span class="product-detail-field">Màu sắc: </span>
				<div class="radio-field">
					<span class="radio-inline">
						<!-- lấy danh sách màu sắt -->
						<?php foreach ($colorProduct as $valueColor) {?>
						<input id="rdColor_<?php echo $itemProduct->id; ?>_<?php echo $valueColor->id; ?>" class="radio-infomation" type="radio" name="rdColor_<?php echo $itemProduct->id; ?>" data-color="<?php echo $valueColor->id; ?>" >
						<label for="rdColor_<?php echo $itemProduct->id; ?>_<?php echo $valueColor->id; ?>">
							<span style="background: #<?php echo $valueColor->Color ?>;"></span>
						</label>
						<?php } ?>
					</span>
				</div>
			</div>
			<?php } ?>
			<!-- end color -->
			<div class="add-cart" data-id='<?php echo $itemProduct->id; ?>' data-name="<?php echo $itemProduct->Name; ?>">
				<div class="btn-addToCart">
					<div class="default-state">
						<span class="fa fa-cart-plus fa-2x"></span>
						<span>Thêm vào giỏ hàng</span>
					</div>
					<div class="active-state">
						<span class="fa fa-cart-plus fa-2x"></span>
						<span>Thêm vào giỏ hàng</span>
					</div>
				</div>
			</div>
		</div>
		<!-- end infomation and select count - color -->
	</div>
	<!-- end infomation product-detail -->
	<!-- start involve product-detail -->
	<div class="product-detail-involve col-xs-12">
		<h4>SẢN PHẨM THƯỜNG ĐƯỢC XEM CÙNG</h4>
		<!-- start slider involve product-detail -->
		<div class="involve-content">
			<div class="swiper-container swiper-container-horizontal swiper-container-free-mode">
				<div class="swiper-wrapper">
					<?php $listProductInvolve = $itemProduct->ProductCategory()->get()[0]->Products()->where([['IsDelete','=',false]])->get();
					?>
					<?php foreach ($listProductInvolve as $valueInvolve) { ?>
					<?php $priceInvolve = $valueInvolve->Prices()->whereNull('EndDate')->get()[0]; ?>
					<div class="swiper-slide" title="<?php echo $valueInvolve->Name; ?>" onclick="detailProduct(<?php echo $valueInvolve->id; ?>)"">
						<?php $img = $valueInvolve->Pictures()->get(); ?>
						<div class="image-invole" style="background-image: url('{!! url('public/images/') !!}/<?php echo isset($img[0]) ? $img[0]->Url : "default.jpg"; ?>');"></div>
						<span class="title-invole"><?php echo substr($valueInvolve->Name,0,22).' ...' ?></span>
						<span class="price-invole"><?php echo $priceInvolve->Price - ($priceInvolve->Price * $priceInvolve->Discount / 100); ?> VNĐ</span>
						<span class="priceOld-invole"><?php echo $priceInvolve->Price ?> VNĐ</span>
						<span class="discount-invole">-<?php echo $priceInvolve->Discount; ?>%</span>
					</div>
					<?php } ?>
				</div>
				<div class="swiper-button-next" style="z-index: 1000"></div>
				<div class="swiper-button-prev swiper-button-disabled"></div>
			</div>
		</div>
		<!-- end imvolve -->
	</div>
	<!-- end involve product-detail -->
	<!-- start comment -->
	<div class="product-detail-comment col-xs-12">
		<!-- title -->
		<div class="cmt-title">
			<h4>BÌNH LUẬN VỀ SẢN PHẨM</h4>
		</div>
		<!-- end title -->
		<!-- start all cmt -->
		<div class="cmt-container">
			<div class="fb-comments" data-href="{!! url(''); !!}/product?id=<?php echo $itemProduct->id; ?>" data-width="100%" data-numposts="5" data-order-by="reverse_time"></div>
		</div>
		<!-- end start all cmt -->
	</div>
	<!-- end comment -->
</div>
</div>
<!-- end row -->
@stop
@section('script')
@parent
<!-- swiper js -->
<script type="text/javascript" src="{!! url('public/js/ProductDetail/swiper.min.js') !!}"></script>
<!-- elevatezoom -->
<script type="text/javascript" src="{!! url('public/js/ProductDetail/jquery.elevatezoom.js') !!}"></script>
<!-- custom javascript -->
<script type="text/javascript" src="{!! url('public/js/ProductDetail/index.js') !!}"></script>
@stop
<?php } ?>
