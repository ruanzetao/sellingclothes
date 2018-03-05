@extends('Account.Remember')
@section('content')
<div name="frmFind">
	{{csrf_field()}}	
	<!-- start change account -->
	<div class="rememver-content">
		<div class="infomation-content">
			<h4>Đặt lại mật khẩu</h4>
			<div class="find-content">
				<span class="Remember-email">Nhập mật khẩu mới từ 8 đến 32 ký tự</span>
				<input class="txtInputRemember" type="password" name="txtEmail" id="txtPass" placeholder="Nhập mật khẩu">
				<span class="Remember-email">Nhập lại</span>
				<input class="txtInputRemember" type="password" name="txtEmail" id="txtPassRe" placeholder="Nhập lại mật khẩu">
			</div>
			<div class="footer-remember">
				<button class="footerBtn btn-success" type="submit" name="btnSuccess" id="btnSuccess">Tiếp tục</button>
			</div>
		</div>
	</div>
	<!-- end change account -->
</div>
@stop
@section('script')
@parent
<script type="text/javascript" src="{!! url('public/js/Account/RememberChangePass.js') !!}"></script>
@stop


