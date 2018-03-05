<?php 
if(isset($_home) && $_home){?>
@extends('_layout')
<?php 
}
?>
<!-- content-body -->
@section('content')
<div class="content-body">
	@section('discount')
	<!-- discount -->
	<?php if(isset($discounts)){
		echo $discounts;
	}?>
	<!-- 	end discount -->
	@show
	<!--  product -->
	@section('product')
	<div class="content text-center">
		<h1><b>Welcome</b> to Nasaxo Shop</h1>
		<p>BEST PRODUCTS YOU EVER SEEN!</p>
	</div>
	<div class="container">
		<!-- nội dung -->
		<div id='productList' class="row product-List">
			<!-- danh sach product -->
			<?php if(isset($products)){
				echo $products;
			}?>
		</div>
		@show
		<!-- end product -->
		<!-- end content body -->
		<!-- Email -->
	</div>
	@stop
	@section('script')
	@parent
	@stop
