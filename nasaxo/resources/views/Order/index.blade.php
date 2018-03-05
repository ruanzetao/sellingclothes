@extends('_layout')
@section('title','Nasaxo Shop')
@section('link')
@parent
<link rel="stylesheet" type="text/css" href="{!! url('public/css/Order/header.css') !!}">
@stop
@section('content')
<div id="header">
	<!-- css my cústom -->
	<!-- paymen progress -->
	<div class="container">
		<div class="shipping-header">
			<div class="row row-style-1">
				<div class="col-lg-8">
					<div class="row bs-wizard">
						<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6 bs-wizard-step disabled">
							<div class="text-center bs-wizard-stepnum">
								<span class="hidden-xs">Địa Chỉ Giao Hàng</span>
								<!-- <span class="visible-xs-inline-block">Địa Chỉ</span> -->
							</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<span class="bs-wizard-dot">1</span>
						</div>

						<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6 bs-wizard-step disabled">
							<div class="text-center bs-wizard-stepnum">
								<span class="hidden-xs">Thanh Toán &amp; Đặt Mua</span>
								<!-- <span class="visible-xs-inline-block">Thanh Toán</span> -->
							</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<span class="bs-wizard-dot">2</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end payment progress -->
</div>
<div id="content">
	@yield('content-order')
</div>
@stop
@section('script')
@parent
<!-- my script -->
<script type="text/javascript" src="{!! url('public/js/Order/order.js') !!}"></script>
@stop

