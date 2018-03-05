// create by namnh
// function load infomation to div content
function LoadInfomationAccount(){
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'POST',
		cache: false,
		url: url +'/account/infomation',
		 data: { '_token': _token},
		success: function($data){
			$('#infomation-content').html($data);
		}
	});
}
function LoadMessageAccount(){
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'POST',
		cache: false,
		url: url +'/account/mess',
		 data: { '_token': _token},
		success: function($data){
			$('#infomation-content').html($data);
		}
	});
}
function LoadOrderAccount(){
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'POST',
		cache: false,
		url: url +'/account/order',
		 data: { '_token': _token},
		success: function($data){
			$('#infomation-content').html($data);
		}
	});
}
function onClick($element){
	var id = $($element).attr('id');
	switch(id){
		case "h4Infomation":LoadInfomationAccount();
		break;
		case "h4Mesage":LoadMessageAccount();
		break;
		case "h4Order":LoadOrderAccount();
		break;
		default:
		LoadInfomationAccount();
	}
}
// set onclick header of info
$('.infomation-account h4').on('click',function(){
	$(".infomation-account h4").css({'border-bottom': '2px dashed #f4f4f4'});
	$(this).css({'border-bottom': '3px solid #fff'});
	onClick(this);
});
// function when load new page
$('#h4Infomation').click();
