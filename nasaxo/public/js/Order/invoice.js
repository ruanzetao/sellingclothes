// function buy
$(document).ready(function(){
	// thực hiện thêm vào giỏ hàng
	$('#btnBuy').off('click').on('click',function(){
		var _token = $('meta[name="_token"]').attr('content');
		$.ajax({
			type: 'POST',
			url: url + '/cart/createorder',
			data: {'_token': _token}
		})
		.done(function($re) {
			if($re=='1'){
				alert('Đặt mua thành công');
				window.location.href = url+'/';
			}else{
				// alert('Có lỗi xảy ra vui lòng kiểm tra lại!');
				// window.location.href = '/';
				console.log($re);
			}
		})
		.fail(function() {
			console.log("error khi thêm order");
		})
	});
});