<link rel="stylesheet" type="text/css" href="{!! url('public/css/Account/Login.css') !!}">
<!-- start login -->
<ul class="nav nav-tabs">
	<li ><a data-toggle="tab" href="#Dangnhap">Đăng nhập</a></li>
	<li ><a data-toggle="tab" href="#Dangki">Đăng kí</a></li>
</ul>
<div class="tab-content">
	<div id="Dangnhap" class="tab-pane fade in active">
		<form class="frmLogin">
			<div class="form-group">
				<label for="email">Email hoặc tên đăng nhập:</label>
				<input type="email" class="form-control" id="email" >
			</div>
			<div class="form-group">
				<label for="pwd">Mật khẩu:</label>
				<input type="password" class="form-control" id="pwd" >
			</div>
			<div class="checkbox">
				<a href="{!! url('/remember/find') !!}" class="RememberPass">Quên mật khẩu</a>
			</div>
			<button id="btnLogin" type="button" class="btn btn-info">Đăng nhập</button>
		</form>
	</div>
	<div id="Dangki" class="tab-pane fade">
		<form class="frmLogin">
			<div class="form-group">
				<label for="usernameRegis">Tên đăng nhập:</label>
				<input type="text" class="form-control" id="usernameRegis" >
			</div>
			<div class="form-group">
				<label for="emailRegis">Email:</label>
				<input type="email" class="form-control" id="emailRegis" >
			</div>
			<div class="form-group">
				<label for="pwdRegis">Password:</label>
				<input type="password" class="form-control" id="pwdRegis" >
			</div>  
			<div class="form-group">
				<label for="Repeat_pwdRegis">Nhập lại mật khẩu:</label>
				<input type="password" class="form-control" id="Repeat_pwdRegis" >
			</div>                  
			<button id="btnRegistration" type="button" class="btn btn-info">Đăng kí</button>
		</form>
	</div>
</div>
<!-- end log in -->
<script type="text/javascript" src="{!! url('public/js/Account/Login.js') !!}"></script>
