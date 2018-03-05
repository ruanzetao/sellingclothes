<!-- start Rfind account -->
@extends('Account.Remember')
@section('content')
<div name="frmFind">
	<div class="rememver-content">
		<div class="infomation-content">
			<h4>Tìm tài khoản của bạn</h4>
			<div class="find-content">
				<span class="Remember-email">Vui lòng nhập tên tài khoản hoặc email </span>
				<input class="txtInputRemember" type="text" name="txtEmail" id="txtEmailRemember" >
			</div>
			<div class="footer-remember">
				<button class="footerBtn btn-success " name="btnSuccess" id="btnSuccess">Tìm kiếm</button>
			</div>
		</div>
	</div>
</div>
<!-- end find account -->
@stop
@section('script')
@parent
<script type="text/javascript" src="{!! url('public/js/Account/RememberFindAccount.js') !!}"></script>
@stop
