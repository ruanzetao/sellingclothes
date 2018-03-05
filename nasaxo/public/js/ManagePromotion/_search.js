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
			// "class": "",
			"text": "#StartDay#"
		},{
			// "class": "",
			"text": "#EndDay#"
		},{
			// "class": "",
			"text": "#Name#"
		},{
			// "class": "",
			"text": "#Discount# %"
		},{
			// "class": "",
			"text": "#BasePurchare# VNĐ"
		},{
			// "class": "",
			"text": "#Description#"
		},{
			// "class": "",
			"text": "#Action#"
		}
		]
	};
	function pageLoaded(){
		$('.editItem').attr('data-toggle','modal');
		$('.editItem').attr('data-target','#PromotionModal');
		// chỉnh sửa
		$('.editItem').off('click').on('click',function(){
			$('.messModel').remove();
			$('#btnSubmitModel').attr('data-style','edit');
			$idUpdate = $(this).data('edit');
			$('#btnSubmitModel').attr('data-iditem',$idUpdate);
			$itemClick = inat.getItem('id',$idUpdate)['data'];
			$itemClick = inat.getItem('id',$idUpdate)['data'];
			$('#imgPromotion').attr('src',url+'/public/images/'+$itemClick['Picture']);
			$('#promotionName').val($itemClick['Name']);
			$('#StartDate').val($itemClick['StartDay']);
			$('#EndDate').val($itemClick['EndDay']);
			$('#promotionBasePureChase').val($itemClick['BasePurchare']);
			$('#promotionDiscount').val($itemClick['Discount']);
			$('#inputDescriotion').val($itemClick['Description']);
		});
		// Xóa
		$('.deleteItem').off('click').on('click',function(){
			if(confirm('Bạn muốn xóa khuyến mãi đã chọn?')){
				$idDelete = $(this).data('delete');
				var _token = $('meta[name="_token"]').attr('content');
				// tạo ra đường dẫn route
				urlNew = url + '/admin/promotion/delete';
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
