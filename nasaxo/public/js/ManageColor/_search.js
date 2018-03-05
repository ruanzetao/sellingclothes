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
			"text": "<input disabled type='color' value='#Color#'>"
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
		$('.editColor').attr('data-toggle','modal');
		$('.editColor').attr('data-target','#colorModal');
		// Xóa
		$('.deleteItem').off('click').on('click',function(){
			if(confirm('Bạn muốn xóa màu đã chọn?')){
				$idDelete = $(this).data('delete');
				var _token = $('meta[name="_token"]').attr('content');
				// tạo ra đường dẫn route
				urlNew = url + '/admin/color/delete';
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
		// chỉnh sửa
		$('.editColor').off('click').on('click',function(){
			$('.messModel').remove();
			$('#btnSubmitModel').attr('data-style','edit');
			$idUpdate = $(this).data('edit');
			$('#btnSubmitModel').attr('data-iditem',$idUpdate);
			$itemClick = inat.getItem('id',$idUpdate)['data'];
			$('#color').val($itemClick['Color']);
			$('#inputDescriotion').val($itemClick['Description']);
		});
	}
	var inat = $("#table-content").PagingTable(columnFormat,listDataTable,pageLoaded);
