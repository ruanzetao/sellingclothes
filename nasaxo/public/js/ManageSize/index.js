// function ajax get view for admin
$('#btnSearch').on('click',function(){
	var _token = $('meta[name="_token"]').attr('content');
	$valueSearch = $('#inputSizeSearch').val();
	// tạo ra đường dẫn route
	urlNew = url + '/admin/size/search';
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
$("#inputSizeSearch").keyup(function(event)
{
	var code = event.keyCode || event.which;
	if (code === 13)
	{
		$('#btnSearch').click();
	}
});
$('#btnAdd').off('click').on('click',function(){
	$('.messModel').remove();
	$('#btnSubmitModel').attr('data-style','add');
	$('#Size').val('');
	$('#inputDescriotion').val('');
});
$('#Size').focusout(function(){
	if($.trim($(this).val())==""){
		$(this).css('border','1px solid red');
	}else{
		$(this).css('border','1px solid #d2d6de');
	}
});
// thêm hoặc xóa
$('#btnSubmitModel').off('click').on('click',function(){
	if($.trim($('#Size').val())==""){
		alert('Vui lòng nhập tên size');
		return;
	}
	$styleSubmit = $(this).attr('data-style');
	if($styleSubmit != 'undefined' && $styleSubmit != null){
		var _token = $('meta[name="_token"]').attr('content');
		$valueName =$('#Size').val();
		$valueDescription = $('#inputDescriotion').val();
		switch($styleSubmit){
			// chỉnh sửa
			case 'edit':
			// tạo ra đường dẫn route
			urlNew = url + '/admin/size/add';
			$idItem = $('#btnSubmitModel').attr('data-iditem');
			// thực hiện lấy view về
			$.ajax({
				type:"POST",
				url: urlNew,
				cache:false,
				data:{'_token':_token,'idSend':$idItem,'valueName':$valueName,'valueDescription':$valueDescription},
				success:function($re){
					if($re=='0'){
						console.log($re);
					}else{
						$('#sizeModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Cập nhật thành công</span>');
						if(typeof inat !== 'undefined'){

							inat.UpdateItemInListRowTable('id',$idItem,{
								'data':{'id':$re['id'],
								'Size':$re['Sizes'],
								'Description':$re['Description'],
								"Action":"<i data-edit='"+$re['id']+"' class='editSize fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+$re['id']+"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
								'STT':inat.getItem('id',$idItem)['data']['STT'],
							},
							'flag':0
						});
						}
					}
				}
			});
			break;
			// thêm
			default:
			// tạo ra đường dẫn route
			urlNew = url + '/admin/size/add';
			// thực hiện lấy view về
			$.ajax({
				type:"POST",
				url: urlNew,
				cache:false,
				data:{'_token':_token,'valueName':$valueName,'valueDescription':$valueDescription},
				success:function($re){
					if($re=='0'){
						console.log($re);
					}else{
						$('#sizeModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Thêm thành công</span>');
						if(typeof inat !== 'undefined'){
							inat.AddRowTable({
								'data':{'id':$re['id'],
								'Size':$re['Sizes'],
								'Description':$re['Description'],
								"Action":"<i data-edit='"+$re['id']+"' class='editSize fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+$re['id']+"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
								'STT':inat.getCountItem()+1,
							},
							'flag':0
						});
						}
					}
				}
			});
			break;
		}
	}
});