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
//  kiểm tra mật khẩu
$('#txtPass').focusout(function(){
	$('#txtPass ~ .messRegis').remove();
	$('#txtPass ~ .messRegis').remove();
	if(!checkpass(this)){
		return;
	}
	checkrePass($(this,'#txtPassRe'));
});
//  kiểm tra mật khẩu
$('#txtPassRe').focusout(function(){
	$('#txtPassRe ~ .messRegis').remove();
	checkrePass($('#txtPass'),this);
});
// thực hiện chỉnh sửa
$('#btnSuccess').off('click').on('click',function(){
	$('.messRegis').remove();
	if(!checkpass($('#txtPass')) || !checkrePass($('#txtPass'),$('#txtPassRe'))){
		return false;
	}
	var _token = $('meta[name="_token"]').attr('content');
	$value = $('#txtPass').val();
	$.ajax({
		type: 'POST',
		cache: false,
		url: url +'/remember/changepass',
		data: { '_token': _token,'passNew':$value},
		success: function($data){
			if($data == '1'){
				window.location.href = url + '/';
			}
			console.log($data);
		}
	});
});