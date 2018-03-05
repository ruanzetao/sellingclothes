// create by namnh
// create table from data listDataTable 
var columnFormat = {
	"tr": {
			// "class": "col"
		},
		"td": [{
			// "class": "",
			"text": "#STT#"
		},{
			"class":"positionLeft",
			"text": "#Picture#"
		},{
			// "class": "",
			"text": "#Name#"
		},{
			// "class": "",
			"text": "#ProductCategory#"
		},{
			// "class": "",
			"text": "#Price#<label class='lable-detail' data-detail='#id#'>Chi tiết</label>"
		},{
			// "class": "",
			"text": "#Description#"
		},{
			// "class": "",
			"text": "#Action#"
		}
		]
	};
	var columnFormatPrice = {
		"tr": {
			// "class": "col"
		},
		"td": [{
			// "class": "",
			"text": "#STT#"
		},{
			"text": "#StartDay#"
		},{
			// "class": "",
			"text": "#EndDay#"
		},{
			// "class": "",
			"text": "#Price#"
		},{
			// "class": "",
			"text": "#Discount#"
		}
		]
	};
//function onclick detail 
function onClickDetail($element){
	$idSearchPrice = $($element).data('detail');
	var _token = $('meta[name="_token"]').attr('content');
	// tạo ra đường dẫn route
	urlNew = url + '/admin/product/prices';
	// thực hiện lấy view về
	$.ajax({
		type:"POST",
		url: urlNew,
		cache:false,
		data:{'_token':_token,'idSend':$idSearchPrice},
		success:function($re){
			if($re == '0'){
				console.log($re);
			}else{
				// phaan trang list gia
				$("#tablePrice").PagingTable(columnFormatPrice,JSON.parse($re));
			}
		}
	});
	
}
function pageLoaded(){
	$('.editItem').attr('data-toggle','modal');
	$('.editItem').attr('data-target','#ProductModal');
	$('.editItem').on('click',function(){
		cls();
		$idEdit = $(this).data('edit');
		$('#btnSubmitModel').attr('data-action','update');
		$('#btnSubmitModel').attr('data-id',$idEdit);
		// lấy thông tin chèn vào form
		var _token = $('meta[name="_token"]').attr('content');
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
	});
	
	$('.lable-detail').attr('data-toggle','modal');
	$('.lable-detail').attr('data-target','#PriceDetailModal');
	$('.lable-detail').on('click',function(){
		onClickDetail(this);
	});

	// Xóa sản phẩm
	$('.deleteItem').off('click').on('click',function(){
		if(confirm('Bạn muốn xóa sản phẩm đã chọn?')){
			$idDelete = $(this).data('delete');
			var _token = $('meta[name="_token"]').attr('content');
			// tạo ra đường dẫn route
			urlNew = url + '/admin/product/delete';
			// thực hiện lấy view về
			$.ajax({
				type:"POST",
				url: urlNew,
				cache:false,
				data:{'_token':_token,'idSend':$idDelete},
				success:function($re){
					if($re != '1'){
						console.log($re);
					}else{
						inat.DeleteItemInListRowTable('id',$idDelete);
					}
				}
			});
		}
	});
}
var inat = $("#table-content").PagingTable(columnFormat,listDataTable,pageLoaded);