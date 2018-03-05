// function set active for focus
$('.treeview-menu>li').on('click',function(){
	$('.treeview-menu>li').removeClass('active');
	$(this).addClass('active');
});
$('.sidebar-menu>li').on('click',function(){
	$('.sidebar-menu>li').removeClass('active');
	$(this).addClass('active');
});
// function ajax get view for admin
$('.getView').on('click',function(){
	var $viewAjax = $(this).data("view");
	var _token = $('meta[name="_token"]').attr('content');
	if($viewAjax != 'undefined' && $viewAjax != null){
		// tạo ra đường dẫn route
		urlNew = url + '/admin/' + $viewAjax;

		// thực hiện lấy view về
		$.ajax({
			type:"POST",
			url: urlNew,
			cache:false,
			data:{'_token':_token},
			success:function($re){
				$('#contentBody').html($re);
			}
		});
	}
});
$('#btnLogout').off('click').on('click',function(){
	var _token = $('meta[name="_token"]').attr('content');
	var urlAjax=url+'/admin/logout';
	$.ajax({
		type:'POST',
		url: urlAjax,
		cache: false,
		data: {'_token':_token},
		success: function($re){
			window.location.href=url + '/admin';
		}
	});
});