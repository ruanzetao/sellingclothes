@extends('Account.Remember')
@section('content')
<!-- start Type account -->
<div name="frmFind">
	{{csrf_field()}}	
	<div class="rememver-content">
		<div class="infomation-content">
			<h4>Nhập mã xác nhận</h4>
			<div class="find-content">
				<span class="Remember-email">Vui lòng nhập mã xác nhận</span>
				<input class="txtInputRemember" type="text" name="txtToken" id="txtToken" placeholder="Nhập mã">
				<span class="Remember-email">Chúng tôi đã gửi mã xác nhận về email của bạn.</span>
			</div>
			<div class="footer-remember">
				<button class="footerBtn btn-success" type="submit" name="btnSuccess" id="btnSuccess">Tiếp tục</button>
			</div>
		</div>
	</div>
</div>
<!-- end Type account -->
@stop
@section('script')
@parent
<script type="text/javascript" src="{!! url('public/js/Account/RemembertypeAccount.js') !!}"></script>
@stop

