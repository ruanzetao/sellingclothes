// create by NAM
function setFilnalPrice(){
	$('.finalTotalPrice').html(finalTotalPrice() + ' VNĐ');
	$('#countProduct').html($('.cart-product').length);
}
// tính giá cuối cùng
function finalTotalPrice(){
	$result = 0;
	$rowCart = $('.cart-product');
	$($rowCart).each(function(index,el) {
		$result+=totalPriceItem(el);
	});
	return $result;
}
// tính tiền từng recort
function totalPriceItem($item){
	$price=$($item).find('.price').data('price');
	$count=$($item).find('.txtNumberProduct').val();
	if($price==null || $price== 'undefined' || $count==null || $count == 'undefined'){
		return 0;
	}
	return ($price*$count);
}
// delete item orderproduct
function clickElement(){
	// delete item  in cart;
	$('.btn-delete').off('click').on('click',function(){
		if(confirm('Bạn có chắc chắn muốn xóa ?')){
			$elementDelete=$(this).closest('.cart-product');
			$urlAjax = url + '/cart/delete';
			$idDelete = $(this).data('delete');
			var _token = $('meta[name="_token"]').attr('content');
			$.ajax({
				url: $urlAjax,
				type:"POST",
				data:{'_token':_token,'idOrderProduct':$idDelete},
			})
			.done(function($re){
				if($re == '1'){
					$($elementDelete).remove();
					setFilnalPrice();
				}else{
					console.log('error return delete');
				}
			})
			.fail(function(){
				console.log('error when call delete');
			});
		}
	});
	// change value of count product
	$('.txtNumberProduct').off('change').on('change',function(){
		if($(this).val()<=0){
			$(this).closest('.cart-product').find('.btn-delete').click();
			$(this).val('1');
		}
		setFilnalPrice();
	});
	// thực hiện mua sản phẩm
	$('#btnBuyProduct').off('click').on('click',function(){
		if($('#countCart').val()<=0){
			$('#submitCart').submit(function(event) {
				event.preventDefault();
			});
			alert('Vui lòng thêm sản phẩm mốn mua!');
			return;
		}
		$valueProducts = [];
		$listProducts = $('.cart-product');
		// lấy danh sách product
		$($listProducts).each(function(index, el) {
			$id = $(this).data('id');
			$color = $(this).find('input[name*=rdColor]:checked').data('color');
			$size = $(this).find('input[name*=rdSize]:checked').data('size');
			$count = $(this).find('input[name=txtNumberProduct]').val();
			// thêm vào danh sách
			$valueProducts.push({'id':$id,'color':$color,'size':$size,'count':$count});
		});
		// set cookie of products
		$.cookie('buyProductList',JSON.stringify($valueProducts));
	});
}
// chạy script khi tải xong giao diện
$(document).ready(function(){
	clickElement();
});
