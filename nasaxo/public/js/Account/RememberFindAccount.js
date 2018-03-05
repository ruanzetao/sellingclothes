$('#btnSuccess').off('click').on('click',function(){
	var _token = $('meta[name="_token"]').attr('content');
	$value = $('#txtEmailRemember').val();
	$.ajax({
		type: 'POST',
		cache: false,
		url: url +'/remember/findAccount',
		data: { '_token': _token,'valueFind':$value},
		success: function($data){
			if($data == '1'){
				window.location.href = url + '/remember/type';
			}else{
				if($('.notifyItem').length<=0)
					$('#txtEmailRemember').after('<span class="notifyItem" style="color:red;"><br>Không tìm thấy tài khoản!</span>')
			}
		}
	});
});