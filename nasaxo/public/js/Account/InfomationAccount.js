// create by namnh-UIT
// request email
// fa fa-exclamation fa-2x
// fa fa-check fa-2x
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
function checkOldPass($pass,$result){
	// thực kiểm tra tồn tại
	var _token = $('meta[name="_token"]').attr('content');
	$urlNew = url + '/account/checkpassold';
	$.ajax({
		type: 'POST',
		url: $urlNew,
		data: {'_token':_token,'passOld': $pass},
	})
	.done(function($re) {
		if($re =='1'){
			return $result(true);
		}else{
			return $result(false);
		}
	})
	.fail(function(){
		return $result(false);
	});

}
//  function check pass word old
$('#txtOldPass').focusout(function(){
	$('#txtOldPass ~ .messRegis').remove();
	checkOldPass($('#txtOldPass').val(),function($re){
		$('#txtOldPass ~ .messRegis').remove();
		if(!$re){
			$mess= '<label class="messRegis" style="color:red;">Mật khẩu không đúng</label>';
			$('#txtOldPass').after($mess);
			return false;
		}
	});
});
$('#txtPass').focusout(function(){
	$('#txtPass ~ .messRegis').remove();
	$('#txtRePass ~ .messRegis').remove();
	if(!checkpass(this)){
		return;
	}
	checkrePass(this,$('#txtRePass'));
});
$('#txtRePass').focusout(function(){
	$('#txtRePass ~ .messRegis').remove();
	checkrePass($('#txtPass'),this);
});
// hiển thị change pass
$('#ckbChangePass').on('change',function(){
	if($(this).is(':checked')){
		$('#Password-content').toggle(300);
	}else{
		$('#Password-content').toggle(300);
	}
});
// cập nhật tài khoản
$('#btnUpdate').off('click').on('click',function(){
	$('.messRegis').remove();
	var _token = $('meta[name="_token"]').attr('content');
	$itemIage = $('#imgUser');
	if($('#ckbChangePass').is(':checked')){
		checkOldPass($('#txtOldPass').val(),function($re){
			if(!$re){
				$mess= '<label class="messRegis" style="color:red;">Mật khẩu không đúng</label>';
				$('#txtOldPass').after($mess);
				return false;
			}
			if(!checkpass('#txtPass')){
				return false;
			}
			if(!checkrePass($('#txtPass'),'#txtRePass')){
				return false;
			}
			$.ajax({
				type : 'POST',
				url: url + '/account/changeinfo',
				data: {'_token':_token ,'Description' : $('#txtDescription').val(),'PasswordOld' : $('#txtOldPass').val(),'Password' : $('#txtPass').val()},
			})
			.done(function($re) {
				if($re =='1'){
					alert('Cập nhật thành công!');
					$('#h4Infomation').click();
				}else{
					alert('Xảy ra lỗi!');
				}
			})
			.fail(function() {
				alert('Xảy ra lỗi!');
			});
		});
	}else{
		$.ajax({
			type : 'POST',
			url: url + '/account/changeinfo',
			data: {'_token':_token, 'image': $itemIage.attr('src'),'Description' : $('#txtDescription').val()},
		})
		.done(function($re) {
			if($re =='1'){
				alert('Cập nhật thành công!');
			}else{
				alert('Xảy ra lỗi!');
				console.log($re);
			}
		})
		.fail(function() {
			alert('Xảy ra lỗi!');
			console.log('Không có gi');
		});
	}
	
});
// function onclick change image
$('.input-Img').on('click',function(){
	$(this).parent().find('input[type=file]').click();
});
// function when input file changes
$('input[type=file]').on('change',function(e){
	imgElement = $(this).parent().find('.input-Img');
	if (this.files && this.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(imgElement).attr('src', e.target.result);
		}
		if(e.target.files[0]['type'].split('/')[0]=='image'){
			reader.readAsDataURL(this.files[0]);
		}
	}
});