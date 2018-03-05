$('#btnSuccess').off('click').on('click',function(){
	var _token = $('meta[name="_token"]').attr('content');
	$value = $('#txtToken').val();
	$.ajax({
		type: 'POST',
		cache: false,
		url: url +'/remember/checkToken',
		data: { '_token': _token,'valueRemember':$value},
		success: function($data){
			if($data == '1'){
				window.location.href = url + '/remember/changepass';
			}else{
				if($('.notifyItem').length<=0)
					$('#txtToken').after('<span class="notifyItem" style="color:red;"><br>Mã xác nhận sai!</span>')
			}
		}
	});
});