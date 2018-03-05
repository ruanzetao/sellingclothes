<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{!! url('public/css/Account/Index.css') !!}">
<div class="row">
	<div class="col-xs-12 infomation-account">
		<h4 id="h4Infomation">Thông tin tài khoản</h4>
		<h4 id="h4Mesage">Thông báo<span>( <span class='countNotify'><?php echo isset($countNotify)? $countNotify :'0' ?> </span> )</span></h4>
		<!-- start content -->
		<div id="infomation-content" class="infomation-content">

		</div>
	</div>
</div>
<!-- end row -->
<!-- my script -->
<script type="text/javascript" src="{!! url('public/js/Account/index.js') !!}"></script>
