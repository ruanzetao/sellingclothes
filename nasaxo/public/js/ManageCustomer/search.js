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
			"text": "#Name#"
		},{
			// "class": "",
			"text": "#Email#"
		},{
			// "class": "",
			"text": "#DeliveryPlace#"
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
		$('.sendEmail').attr('data-toggle','modal');
		$('.sendEmail').attr('data-target','#CustomerModal');
		$('.sendEmail').off('click').on('click',function(){
			$('#btnSubmitModel').attr('data-send',$(this).data('send'));
		});
	}
	var inat = $("#table-content").PagingTable(columnFormat,listDataTable,pageLoaded);
	$('#btnSubmitModel').off('click').on('click',function(){
		var $idUser = $(this).attr('data-send');
		var $valueSend = $('#inputDescriotionSend').val();
		var _token = $('meta[name="_token"]').attr('content');
		// tạo ra đường dẫn route
		urlNew = url + '/admin/customer/sendEmail';
		// thực hiện lấy view về
		$.ajax({
			type:"POST",
			url: urlNew,
			cache:false,
			data:{'_token':_token,'idSend':$idUser,'valueSend':$valueSend},
			success:function($re){
				if($re != '1'){
					console.log('fail send mail');
				}
			}
		});
		$valueSend = $('#inputDescriotionSend').val('');
	});
	

	