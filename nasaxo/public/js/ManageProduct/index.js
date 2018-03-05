function cls(){
	$('#txtCategory').val('');
	$('#txtIdCategory').val('');
	$('#Product').val('');
	$('#discountProduct').val('');
	$('#priceProduct').val('');
	$('#inputDescriotion').val('');
	$('#groupColors').html('');
	$('#groupSizes').html('');
	$('#groupPicture').html('');
	$('.messModel').remove();

}
// function onclick change image
$('.input-Img').on('click',function(){
	$(this).parent().find('input[type=file]').click();
});
// function when input file changes
$('input[type=file]').on('change',function(e){
	groupPicture = $(this).parent().find('.groupPicture');
	var files = e.target.files; //FileList object
	$.each(files, function(i, file) {
		var pReader = new FileReader(); 
		pReader.addEventListener("load", function(ePicture){
			var pic = ePicture.target;  // 1 file              
			groupPicture.append('<div class="item-picture"><img class="img-product-edit" src="' + pic.result + '"/><span title="Bỏ hình ảnh" class="removeImg"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></div>');
			RemovePictureEvent(groupPicture);
		});
		if(file['type'].split('/')[0]=='image'){
			pReader.readAsDataURL(file);
		}
	});
	$(this).val('');
});
// remove picture
function RemovePictureEvent(elemtne){
	$(elemtne).find('.removeImg').on('click',function(){
		$(this).parent().remove();
	});
}

// function ajax get view for admin
$('#btnSearch').on('click',function(){
	var _token = $('meta[name="_token"]').attr('content');
	$valueSearch = $('#inputSearch').val();
	// tạo ra đường dẫn route
	urlNew = url + '/admin/product/search';
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
$("#inputSearch").keyup(function(event)
{
	var code = event.keyCode || event.which;
	if (code === 13)
	{
		$('#btnSearch').click();
	}
});
$('#txtCategory').autocomplete({
	minLenght:3,
	autoFocus:true,
	source: url+'/admin/productcategory/getListCategory',
	select: function(event,ui){
		$('#txtIdCategory').val(ui.item.id);
	},
});
$('#txtColor').autocomplete({
	minLenght:3,
	autoFocus:true,
	source: url+'/admin/color/getListColor',
	select: function(event,ui){
		$isAppen = true;
		$groupColors = $('#groupColors');
		$($groupColors).find('.itemDetail').each(function(){
			if($(this).attr('data-color')==ui.item.id){
				$isAppen = false;
			}
		});
		if($isAppen){
			$groupColors.append('<div class="itemDivDetail"><span data-color="'+ ui.item.id +'" style="background-color:#'+ui.item.color+';" class="itemDetail" > </span><span style="top: -32px;" title="Bỏ màu" class="removeItem"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></div>');
			$($groupColors).find('.removeItem').off('click').on('click',function(){
				$(this).parent().remove();
			});
		}
		$('#txtColor').val('');
		event.preventDefault();
	},
});
$('#txtSize').autocomplete({
	minLenght:3,
	autoFocus:true,
	source: url+'/admin/size/getListSize',
	select: function(event,ui){
		$isAppen = true;
		$groupSize = $('#groupSizes');
		$($groupSize).find('.itemDetail').each(function(){
			if($(this).attr('data-size')==ui.item.id){
				$isAppen = false;
			}
		});
		if($isAppen){
			$groupSize.append('<div class="itemDivDetail"><span data-size="'+ ui.item.id +'" class="itemDetail" >'+ui.item.value+'</span><span title="Bỏ kích thước" class="removeItem"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></div>');
			$($groupSize).find('.removeItem').off('click').on('click',function(){
				$(this).parent().remove();
			});
		}
		$('#txtSize').val('');
		event.preventDefault();
	},
});
// thực hiện thêm
$('#btnAdd').off('click').on('click',function(){
	cls();
	$('#btnSubmitModel').attr('data-action','add');
});
$('#btnSubmitModel').off('click').on('click',function(){
	$styleSubmit = $(this).attr('data-action');
	if($.trim($('#txtIdCategory').val())=='' || $.trim($('#Product').val())=='' || $.trim($('#priceProduct').val())==''){
		alert('Chưa nhập thông tin sản phẩm!');
		return;
	}
	// lấy category
	$idCategory  = $('#txtIdCategory').val();
	// lấy tên product
	$nameProduct = $('#Product').val();
	// lấy thông tin danh sách color
	$listColor = [];
	$('#groupColors').find('.itemDivDetail').each(function(){
		$(this).find('.itemDetail').each(function(){
			$listColor.push($(this).attr('data-color'));
		});
	});
	// lấy thông tin danh sách color
	$listSize = [];
	$('#groupSizes').find('.itemDivDetail').each(function(){
		$(this).find('.itemDetail').each(function(){
			$listSize.push($(this).attr('data-size'));
		});
	});
	// lấy thông tin giá
	$intPrice = $('#priceProduct').val();
	// lấy thông tin khuyến mãi
	$intDiscount = $('#discountProduct').val();
	// lấy danh sách hình ảnh
	$listPicture = [];
	$('#groupPicture').find('.item-picture').each(function(){
		$(this).find('.img-product-edit').each(function(){
			$listPicture.push($(this).attr('src'));
		});
	});
	var _token = $('meta[name="_token"]').attr('content');
	// lấy thông tin mô tả
	// tạo ra đường dẫn route
	urlNew = url + '/admin/product/add';
	$Description = $('#inputDescriotion').val();
	switch($styleSubmit){
		// thực hiện update sản phẩm
		case 'update':
		$idUpdate  = $('#btnSubmitModel').attr('data-id');
		$.ajax({
			type:"POST",
			url: urlNew,
			cache:false,
			data:{'_token':_token,'idProduct':$idUpdate,'idCategory':$idCategory,'nameProduct':$nameProduct,'listColor':$listColor,'listSize':$listSize,'price':$intPrice,'discount':$intDiscount,'pictures':$listPicture,'Description':$Description},
			success:function($re){
				if($re !=='0'){
					$('#ProductModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Cập nhật thành công</span>');
					if(typeof inat !== 'undefined'){
						inat.UpdateItemInListRowTable('id',$idUpdate,{
							'data':{'id':$re['id'],
							'STT':inat.getCountItem()+1,
							'Picture': $re['picture'],
							'Name':$re['Name'],
							'ProductCategory':$re['category'] ,
							'Price': $re['price'] ,
							'Description':$re['Description'],
							'Action':"<i data-edit='"+ $re['id'] +"' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+ $re['id'] +"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
						},
						'flag':0
					});
					}
					// tạo ra đường dẫn route
					urlNew = url + '/admin/product/getItem';
					// thực hiện lấy view về
					$.ajax({
						type:"POST",
						url: urlNew,
						cache:false,
						data:{'_token':_token,'idSend':$idEdit},
						success:function($re){
						// tên nhóm sp
						$('#txtCategory').val($re['nameCategory']);
						// id nhóm
						$('#txtIdCategory').val($re['idCategory']);
						// tên sp
						$('#Product').val($re['nameProduct']);
						// giảm giá
						$('#discountProduct').val($re['discount']);
						// giá
						$('#priceProduct').val($re['price']);
						// mô tả
						$('#inputDescriotion').val($re['Description']);
						// màu 
						$('#groupColors').html($re['listColor']);
						// size
						$('#groupSizes').html($re['listSize']);
						// hình ảnh
						$('#groupPicture').html($re['pictures']);

						$('#groupSizes').find('.removeItem').off('click').on('click',function(){
							$(this).parent().remove();
						});
						$('#groupColors').find('.removeItem').off('click').on('click',function(){
							$(this).parent().remove();
						});
						$('#groupPicture').find('.item-picture').off('click').on('click',function(){
							$(this).remove();
						});
					}
				});
				}
			}
		});
		break;
		// thực hiện thêm
		default:
		$.ajax({
			type:"POST",
			url: urlNew,
			cache:false,
			data:{'_token':_token,'idCategory':$idCategory,'nameProduct':$nameProduct,'listColor':$listColor,'listSize':$listSize,'price':$intPrice,'discount':$intDiscount,'pictures':$listPicture,'Description':$Description},
			success:function($re){
				if($re !=='0'){
					$('#ProductModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Thêm thành công</span>');
					if(typeof inat !== 'undefined'){
						inat.AddRowTable({
							'data':{'id':$re['id'],
							'STT':inat.getCountItem()+1,
							'Picture': $re['picture'],
							'Name':$re['Name'],
							'ProductCategory':$re['category'] ,
							'Price': $re['price'] ,
							'Description':$re['Description'],
							'Action':"<i data-edit='"+ $re['id'] +"' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+ $re['id'] +"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
						},
						'flag':0
					});
					}
				}
			}
		});
		break;
	}
});