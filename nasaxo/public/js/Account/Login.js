function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
};
// function login
function Login($email,$passWord){
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'post',
		url: url + '/login/acept',
		cache: false,
		data: {'_token': _token,'email':$email,'password':$passWord},
	})
	.done(function($re) {
		if($re!=='0'){
			$('#accountHome').html($re);
			$('.modal .close').click();
			$('.modal .modal-dialog .modal-body').html('');
			loadScript();
			return true;
		}else{
			alert('Không tìm thấy tài khoản hoặc mật khẩu sai!');
			return false;
		}
	})
	.fail(function() {
		alert('Không tìm thấy tài khoản hoặc mật khẩu sai!');
		return false;
	});
}
// kiểm tra có phải email k
function checkisEmail($email){
	if(!isValidEmailAddress($($email).val())){
		$mess= '<label class="messRegis" style="color:red;">Nội dung nhập không phải email</label>';
		$($email).after($mess);
		return false;
	}
	return true;
}
// kiểm tra độ dài mật khẩu
function checkpass($password){
	if($($password).val()=='' || $($password).val().length < 8){
		$mess= '<label class="messRegis" style="color:red;">Mật khẩu phải lớn hơn 8 kí tự</label>';
		$($password).after($mess);
		return false;
	}
	return true;
}
// kiểm tra trùng pass
function checkrePass($password,$rePasswork){
	if($($password).val() != $($rePasswork).val()){
		$mess= '<label class="messRegis" style="color:red;">Mật khẩu không trùng nhau</label>';
		$($rePasswork).after($mess);
		return false;
	}
	return true;
}
// kiểm tra email
function isExistsEmail($email,$result){
	// thực kiểm tra tồn tại
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'post',
		url: url + '/login/checkemail',
		cache: false,
		data: {'_token': _token,'emailCheck':$email},
	})
	.done(function($re) {
		if($re!=='0'){
			return $result(true);
		}else{
			return $result(false);
		}
	})
	.fail(function(){
		return $result(false);
	});
}
// kiểm tồn tại username
function isExistsUsername($username,$result){
	// thực kiểm tra tồn tại
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'post',
		url: url + '/login/checkusername',
		cache: false,
		data: {'_token': _token,'usernameCheck':$username},
	})
	.done(function($re) {
		if($re!=='0'){
			return $result(true);
		}else{
			return $result(false);
		}
	})
	.fail(function(){
		return $result(false);
	});
}
// thực hiện tạo tài khoản
function Registration($username, $email, $password, $rePasswork){
	$('#btnRegistration ~ .messRegis').remove();
	if($($username).val()=='' || $($username).val()=='' || $($username).val()=='' || $($username).val()==''){
		$mess= '<label class="messRegis" style="color:red;">Vui lòng nhập đầy đủ thông tin</label>';
		$('#btnRegistration').after($mess);
		return false;
	}
	if(!checkpass($password) || !checkrePass($password,$rePasswork)){
		return false;
	}
	$listArr ={
		'username' : $($username).val(),
		'email': $($email).val(),
		'password': $($password).val(),
	};
	// thực hiện tạo tài khoản
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'post',
		url: url + '/login/regis',
		cache: false,
		data: {'_token': _token,'user':$listArr},
	})
	.done(function($re) {
		if($re!=='0'){
			$('#accountHome').html($re);
			$('.modal .close').click();
			$('.modal .modal-dialog .modal-body').html('');
			loadScript();
			return true;
		}else{
			alert('Chưa nhập đúng thông tin!');
			return false;
		}
	})
	.fail(function() {
		alert('Chưa nhập đúng thông tin!');
		return false;
	});
}
// thực hiện login
$('#btnLogin').off('click').on('click',function(){
	Login($('#email').val(),$('#pwd').val());
});
// thực hiện đăng ký
$('#btnRegistration').off('click').on('click',function(){
	$username =$('#usernameRegis');
	$email = $('#emailRegis');
	$pass = $('#pwdRegis');
	$repass = $('#Repeat_pwdRegis');
	$('#pwdRegis ~ .messRegis').remove();
	$('#Repeat_pwdRegis ~ .messRegis').remove();
	Registration($username,$email,$pass,$repass);
});
// kiem tra username
$('#usernameRegis').focusout(function(){
	$element = $(this);
	$('#usernameRegis ~ .messRegis').remove();
	// kiểm tra có trống
	if($(this).val()==''){
		$mess= '<label class="messRegis" style="color:red;">Chưa nhập tài khoản</label>';
		$($element).after($mess);
		return;
	}
	// kiểm tra tồn tại
	isExistsUsername($(this).val(),function($re){
		if($re){
			$mess= '<label class="messRegis" style="color:red;">Tài khoản đã tồn tại</label>';
			$($element).after($mess);
		}
	});
});
// kiem tra email
$('#emailRegis').focusout(function(){
	$element = $(this);
	$('#emailRegis ~ .messRegis').remove();
	if($(this).val()==''){
		$mess= '<label class="messRegis" style="color:red;">Chưa nhập email</label>';
		$($element).after($mess);
		return;
	}
	if(!checkisEmail($element)){
		return;
	}
	isExistsEmail($(this).val(),function($re){
		if($re){
			$mess= '<label class="messRegis" style="color:red;">Email đã tồn tại</label>';
			$($element).after($mess);
		}
	});
});
//  kiểm tra mật khẩu
$('#pwdRegis').focusout(function(){
	$('#pwdRegis ~ .messRegis').remove();
	if(!checkpass(this)){
		return;
	}
	checkrePass($(this,'#Repeat_pwdRegis'));
});
//  kiểm tra mật khẩu
$('#Repeat_pwdRegis').focusout(function(){
	$('#Repeat_pwdRegis ~ .messRegis').remove();
	checkrePass($('#pwdRegis'),this);
});