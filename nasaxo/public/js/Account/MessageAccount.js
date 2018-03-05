// creat by namnh
$('.message-delete').off('click').on('click',function(){
	if(confirm('Bạn có chắc chắn muốn xóa ?')){
		$idUpdate = $(this).data('id');
		$divClick = $(this).closest('div[ class *=groupMessage-]');
		var _token = $('meta[name="_token"]').attr('content');
		$.ajax({
			type: 'POST',
			cache: false,
			url: url +'/account/updateMess',
			data: { '_token': _token,'idUpdate':$idUpdate},
			success: function($data){
				if($data == '1'){
					$count=parseInt($('.countNotify').html());
					if($($divClick).data('notify')=='1'){
						$('.countNotify').html(--$count);
					}
					$($divClick).remove();
				}
			}
		});
	}
});
function update(element){
	$idUpdate = $(element).data('id');
	$divClick = $(element).closest('div[class *=groupMessage-]');
	var _token = $('meta[name="_token"]').attr('content');
	$.ajax({
		type: 'POST',
		cache: false,
		url: url +'/account/updateMess',
		data: { '_token': _token,'idUpdate':$idUpdate,'notify':$divClick.attr('data-notify')},
		success: function($data){
			if($data == '1'){
				$count=parseInt($('.countNotify').html());
				if($divClick.attr('data-notify') == '1'){
					$('.countNotify').html(--$count);
					$($divClick).attr('data-notify','0');
					$divClick.find('.message-checkRead').removeClass('fa-bell-o').addClass('fa-bell-slash-o');
					$divClick.removeClass('groupMessage-unread').addClass('groupMessage-read');
				}else{
					$('.countNotify').html(++$count);
					$($divClick).attr('data-notify','1');
					$divClick.find('.message-checkRead').removeClass('fa-bell-slash-o').addClass('fa-bell-o');
					$divClick.removeClass('groupMessage-read').addClass('groupMessage-unread');
					
				}
			}
		}
	});
}
// update notify
$('.message-checkRead').off('click').on('click',function(){
	update(this);
});