<?php if(isset($user)){
	$listNotify = $user->Messages()->where([['IsDelete','=',false]])->get();
	foreach ($listNotify as $value) {?>
	<div class="<?php echo $value->IsNotify == true ? 'groupMessage-unread' : 'groupMessage-read'?>" data-notify="<?php echo $value->IsNotify==true ? '1':'0'; ?>">
		<div class="mesage-date"><?php echo isset($value->CreateDate) ? $value->CreateDate : "";  ?></div>
		<i data-id="<?php echo $value->id; ?>" class="message-checkRead fa <?php echo $value->IsNotify == true ? 'fa-bell-o' : 'fa-bell-slash-o'?>" aria-hidden="true" title="<?php echo $value->IsNotify == false ? 'Bật' : 'Tắt'?> thông báo"></i>
		<i data-id="<?php echo $value->id; ?>" class="message-delete fa fa-trash-o" aria-hidden="true" title="Xóa thông báo"></i>
		<div class="message-notify"><?php echo isset($value->Description) ? $value->Description : ""; ?></div>
	</div>
	<?php }
} ?>
<!-- custom js -->
<script type="text/javascript" src="{!! url('public/js/Account/MessageAccount.js') !!}"></script>
