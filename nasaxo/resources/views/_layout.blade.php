<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@section('title') Nasaxo  Shop @show</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}">
	<meta property="fb:app_id" content="1905424643105702" />
	<link rel="icon" type="image/png" href="{!! url('public/images/ico-title.png') !!}">
	<!-- font fa -->
	<link rel="stylesheet" type="text/css" href="{!! url('public/css/font-awesome.min.css') !!}">
	@section('link') 
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap.css') !!}">
	<!-- css jqueri ui -->
	<link rel="stylesheet" type="text/css" href="{!! url('public/css/jquery-ui.min.css') !!}">
	<!-- css my cústom -->
	<link rel="stylesheet" type="text/css" href="{!! url('public/css/Home/Home.css') !!}">
	@show
	<link href="https://fonts.googleapis.com/css?family=Lato|Libre+Baskerville:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
	<!-- jquery -->
	<script type="text/javascript" src="{!! url('public/js/jquery.min.js') !!}"></script>
	<!-- bút tráp  -->
	<script type="text/javascript" src="{!! url('public/js/bootstrap.min.js') !!}"></script>
	<!-- notify -->
	<script type="text/javascript" src="{!! url('public/js/notify.js') !!}"></script>
	<!-- cookie -->
	<script type="text/javascript" src="{!! url('public/js/jquery.cookie.js') !!}"></script>
	<!-- jqueri ui -->
	<script type="text/javascript" src="{!! url('public/js/jquery-ui.min.js') !!}"></script>
	<!-- script home -->
	<script type="text/javascript" src="{!! url('public/js/Home/index.js') !!}"></script>

</head>
<body>
	<!-- form ẩn danh sách biến -->
	<script type="text/javascript">
		var url="{!! url('') !!}";
	</script>
	<!-- // go to view product -->
	<form id="frmPage" style="display:'none';" action="{!! url('/') !!}" method="GET" enctype='multipart/form-data'>
		<input id="pageList-frm" type="hidden" name="pageList" value="<?php echo isset($param['pageList'])? $param['pageList'] : 0 ?>">	
		<input id="numberRecord-frm" type="hidden" name="numberRecord" value="<?php echo isset($param['numberRecord'])? $param['numberRecord'] : 12 ?>">
		<input id="productCategory-frm" type="hidden" name="productCategory" value="<?php if(isset($param['productCategory'])) echo $param['productCategory'] ?>">
		<input id="nameProduct-frm" type="hidden" name="nameProduct" value="<?php if(isset($param['nameProduct'])) echo $param['nameProduct'] ?>">
		<input id="bestSeller-frm" type="hidden" name="bestSeller" value="<?php if(isset($param['bestSeller'])) {echo $param['bestSeller'];}else{echo '0';} ?>">
	</form>
	<!-- model -->
	<div class="modal fade in" id="homeModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Login</h4>
				</div>
				<div class="modal-body">
					ahihi
				</div>
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Chấp nhận</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
				</div> -->
			</div>

		</div>
	</div>
	<!-- top-header -->			
	<nav id="header-nav" class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!! url('/') !!}">Nasaxo Shop</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<div class="input-group divSearch">
							<input type="text" id='txtSearch' class="form-control" name="txtSearch" placeholder="Search...">
							<span class="input-group-addon" id="btnSearch">
								<i class="glyphicon glyphicon-search btnSearch"></i>
							</span>
						</div>
					</li>
					<li id="btnBestSeller"><a href="#">Best seller</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
						<ul id="dropdownMenu" class="dropdown-menu">
							<?php if(isset($categorys)){
								foreach ($categorys as $value) {
									?>
									<li class="category-home" data-category='<?php echo $value['id']; ?>'><a><?php echo $value['Name'] ?></a></li>
									<?php 
								}
							} ?>
						</ul>
					</li>
					<li id="btnCart"><a class="glyphicon glyphicon-shopping-cart"></a></li>
					<li id="accountHome">
						<!-- đã lưu accont -->
						@if (Cookie::get('accountHome') !== null)
						<?php 
						$values=Cookie::get('accountHome');
						$values = stripslashes($values);
						$savedAccount = json_decode($values, true);
						?>
						<a class="dropdown-toggle" data-toggle="dropdown"><img src="{!! url('/public/images') !!}/<?php echo $savedAccount['image']; ?>" class="user-image-home" alt="User Image"><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li id="btnProfile" data-account="<?php echo $savedAccount['id'] ?>"><a>Profile</a></li>
							<li id="btnLogout"><a>Logout</a></li>
						</ul>
						<?php
						?>
						<!-- chưa -->
						@else
						<a id="btnLogin" data-toggle="modal" data-target="#homeModal">Sign in</a>
						@endif
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<!-- end top-header	 -->
	<!-- content-body -->
	<div class="content-body">
		<div class="content-product" id="contentProduct">
			@yield('content')
		</div>
		<!-- end product -->
	</div>
	<!-- end content body -->
	<!-- btn back to top -->
	<a href="#" id="scroll" title="Scroll to top" style="display:none;"><span></span></a>
	<!-- end back to top -->
	<!-- Email -->
	<footer class="container footer">
		<div class="row text-center">
			<!-- address -->
			<div class="col-md-6 col-md-push-3">
				<span><b>Address:</b>  KTX-khu B ĐHQG TP HCM</span><br>
				<span><b>Phone:</b> 0952 432 685</span><br>
				<span><b>Email:</b> mail@gmail.com</span><br>
				<span><b>Working days/hours:</b> Mon-Sun/9:00AM-8:00PM</span><br>
			</div>
		</div>
	</footer>
	<!--  api facebook -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=1905424643105702';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	@section('script')
	
	
	<!-- easing -->
	<script type="text/javascript" src="{!! url('public/js/Home/jquery.easing.1.3.js') !!}"></script>

	@show
</body>
</html>