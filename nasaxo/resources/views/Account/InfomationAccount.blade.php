<?php if(isset($user)){ ?>
<link rel="stylesheet" type="text/css" href="{!! url('public/css/Account/information.css') !!}">
<form enctype="multipart/form-data" id="upload_form" method="POST" action="" class="row">
	{{csrf_field()}}
	<div class="imageUser col-xs-2">
		<?php $image =  $user->Picture()->get();?>
		<img title="Click để thay đổi hình ảnh" class="input-Img" id="imgUser" src="{!! url('public/images') !!}/<?php echo isset($image[0])? $image[0]->Url : "default.jpg"; ?>">
		<input type="file" class="form-control" id="fileUpload" name="fileUpload" style="display: none;">
	</div>
	<div class="col-xs-10">
		<!-- tên đăng nhập -->
		<div class="group-content">
			<span  class="field-lable">Tên đăng nhập: </span>
			<input id="txtUserName" disabled class="field-input" type="text" name="userName" value="<?php echo $user->Username; ?>">
		</div>
		<!-- end tên đăng nhập -->
		<!-- email -->
		<div class="group-content">
			<span class="field-lable">Email: </span>
			<input class="field-input" disabled type="text" name="txtEmail" id="txtEmail" value="<?php echo $user->Email; ?>">
		</div>
		<!-- ./email -->
		<!-- start description -->
		<div class="group-content">
			<span class="field-lable">Mô tả về bản thân:  </span>
			<textarea class="field-input" type="text" name="Description" id="txtDescription"><?php echo $user->Description; ?></textarea>
		</div>
		<!-- end description -->
		<div class="group-content">
			<label class="ckb-ChangePass">
				<input type="checkbox" name="ckbChangePass" id="ckbChangePass">
				Thay đổi mật khẩu
			</label>
		</div>
		<!-- start password -->
		<div id="Password-content" class="password-content" style="display: none;">
			<div class="group-content">
				<span class="field-lable">Mật khẩu củ: </span>
				<input class="field-input" type="password" name="txtOldPass" id="txtOldPass" placeholder="Nhập mật khẩu củ" value="">
				<i id="checkOldPass" style="display: none;" aria-hidden="true"></i>
			</div>
			<div class="group-content">
				<span class="field-lable">Mật khẩu mới: </span>
				<input class="field-input" type="password" name="txtOldPass" id="txtPass" placeholder="Nhập mật khẩu từ 8 đến 32 ký tự" value="">
				<i id="checkPass" style="display: none;" aria-hidden="true"></i>
			</div>
			<div class="group-content">
				<span class="field-lable">Nhập lại: </span>
				<input class="field-input" type="password" name="txtOldPass" id="txtRePass" placeholder="Nhập lại mật khẩu mới" value="">
				<i id="checkRePass" style="display: none;" aria-hidden="true"></i>
			</div>
		</div>
		<!-- end password -->
		<div class="password-content">
			<input class="btn-update btn btn-success" type="button" id="btnUpdate" value="Cập nhật">
		</div>
	</div>
</form>
<script type="text/javascript" src="{!! url('public/js/Account/InfomationAccount.js') !!}"></script>
<?php } ?>
<!-- end content -->
<!-- end container -->
<!-- custom js -->
