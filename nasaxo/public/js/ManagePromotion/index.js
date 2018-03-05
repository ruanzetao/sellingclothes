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
// search
$("#inputSearch").keyup(function(event)
{
	var code = event.keyCode || event.which;
	if (code === 13)
	{
		$('#btnSearch').click();
	}
});

// function ajax get view for admin
$('#btnSearch').on('click',function(){
	var _token = $('meta[name="_token"]').attr('content');
	$valueSearch = $('#inputSearch').val();
	// tạo ra đường dẫn route
	urlNew = url + '/admin/promotion/search';
	// thực hiện lấy view về
	$.ajax({
		type:"POST",
		url: urlNew,
		cache:false,
		data:{'_token':_token,'valueSearch':$valueSearch},
		success:function($re){
			$('#contentBodySearch').html($re);
		}
	});
});
$('#btnAdd').off('click').on('click',function(){
	$('.messModel').remove();
	$('#btnSubmitModel').attr('data-style','add');
	$('#imgPromotion').attr('src','');
	$('#StartDate').val('');
	$('#EndDate').val('');
	$('#promotionName').val('');
	$('#promotionBasePureChase').val('');
	$('#promotionDiscount').val('');
	$('#inputDescriotion').val('');
});
// thêm hoặc xóa
$('#btnSubmitModel').off('click').on('click',function(){
	$styleSubmit = $(this).attr('data-style');
	if($styleSubmit != 'undefined' && $styleSubmit != null){
		var _token = $('meta[name="_token"]').attr('content');
		$imgPromotion = $('#imgPromotion').attr('src');
		$startDate = $('#StartDate').val();
		$endDate = $('#EndDate').val();
		$promotionName = $('#promotionName').val();
		$basePureChase = $('#promotionBasePureChase').val();
		$promotionDiscount = $('#promotionDiscount').val();
		$valueDescription = $('#inputDescriotion').val();
		switch($styleSubmit){
			// chỉnh sửa
			case 'edit':
			// tạo ra đường dẫn route
			urlNew = url + '/admin/promotion/add';
			$idItem = $('#btnSubmitModel').attr('data-iditem');
			// thực hiện lấy view về
			$.ajax({
				type:"POST",
				url: urlNew,
				cache:false,
				data:{'_token':_token,'idSend':$idItem,'valueDescription':$valueDescription,'promotionDiscount':$promotionDiscount,'basePureChase':$basePureChase,'promotionName':$promotionName,'endDate':$endDate,'imgPromotion':$imgPromotion,'startDate':$startDate},
				success:function($re){
					console.log($re);
					if($re=='0'){
					}else{
						$('#PromotionModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Cập nhật thành công</span>');
						if(typeof inat !== 'undefined'){
							inat.UpdateItemInListRowTable('id',$idItem,{
								'data':{'id':$re['id'],
								'EndDay':$re['EndDate'],
								'Picture':$re['Picture'],
								'StartDay':$re['StartDate'],
								'Name':$re['Name'],
								'Discount':$re['Discount'],
								'BasePurchare':$re['BasePurchase'],
								'Description':$re['Description'],
								"Action":"<i data-edit='"+$re['id']+"' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+$re['id']+"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
								'STT':inat.getItem('id',$idItem)['data']['STT'],
							},
							'flag':0
						});
						}
						$('#imgPromotion').attr('src',url+'/public/images/'+$re['Picture']);
						
					}
				}
			});
			break;
			// thêm
			default:
			// tạo ra đường dẫn route
			urlNew = url + '/admin/promotion/add';
			// thực hiện lấy view về
			$.ajax({
				type:"POST",
				url: urlNew,
				cache:false,
				data:{'_token':_token,'valueDescription':$valueDescription,'promotionDiscount':$promotionDiscount,'basePureChase':$basePureChase,'promotionName':$promotionName,'endDate':$endDate,'imgPromotion':$imgPromotion,'startDate':$startDate},
				success:function($re){
					if($re=='0'){

					}else{
						$('#colorModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Thêm thành công</span>');
						if(typeof inat !== 'undefined'){
							inat.AddRowTable({
								'data':{'id':$re['id'],
								'EndDay':$re['EndDate'],
								'Picture':$re['Picture'],
								'StartDay':$re['StartDate'],
								'Name':$re['Name'],
								'Discount':$re['Discount'],
								'BasePurchare':$re['BasePurchase'],
								'Description':$re['Description'],
								"Action":"<i data-edit='"+$re['id']+"' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+$re['id']+"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
								'STT':inat.getCountItem()+1,
							},
							'flag':0
						});
						}
						$('#imgPromotion').attr('src',url+'/public/images/'+$re['Picture']);

					}
				}
			});
			break;
		}
	}
});