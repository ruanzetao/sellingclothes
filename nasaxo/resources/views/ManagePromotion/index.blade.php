
<!-- table-sort -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/table-sort/PagingTable.css') !!}">
<!-- my custom -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/ManagePromotion/index.css') !!}">
<body>
	<!-- Modal -->
	<div class="modal fade" id="PromotionModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content product-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Thông tin Khuyến mãi</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="">
						<div class="form-group">
							<div class="col-xs-12">
								<img id="imgPromotion" class="input-Img" src="">
								<input type="file" class="form-control" id="productPicture" name="productPicture" style="display: none;">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="StartDate">Ngày bắt đầu:</label>
							<div class="col-xs-9">
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
									<input type="date" class="form-control" id="StartDate" name="StartDate">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="EndDate">Ngày kết thúc:</label>
							<div class="col-xs-9">
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
									<input type="date" class="form-control" id="EndDate" name="EndDate">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="promotionName">Tên:</label>
							<div class="col-xs-9">
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id="promotionName" name="promotionName">
								</div>
							</div>
						</div>
						<div class="form-group" title="Số tiền ít nhất để đạt khuyến mãi">
							<label class="control-label col-sm-3" for="promotionBasePureChase" >Yêu cầu:</label>
							<div class="col-xs-9">
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id="promotionBasePureChase" name="promotionBasePureChase">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="promotionDiscount">Giảm giá:</label>
							<div class="col-xs-9">
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-bomb" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id="promotionDiscount" name="promotionDiscount">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="inputDescriotion">Mô tả:</label>
							<div class="col-sm-9"> 
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-comment" aria-hidden="true"></i></span>
									<textarea class="form-control txtDescription" id="inputDescriotion" ></textarea>
								</div>        
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button id="btnSubmitModel" type="button" class="btn btn-info">Chấp nhận</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
				</div>
			</div>

		</div>
	</div>
	<!-- end modals -->
	<!-- start container -->
	<div class="container-fluit">
		<!-- start row -->
		<div class="row">
			<div class="col-xs-12 header-content">
				<div class="col-md-4">
					<button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#PromotionModal">+</button>
					<div class="form-inline col-md-12">
						<div class="form-group pull-left col-md-12">
							<div class="input-group">
								<input id="inputSearch" type="text" class="form-control" placeholder="Khuyến mãi...">
								<div id="btnSearch" class="btn btn-default input-group-addon">
									<i class="glyphicon glyphicon-search"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="contentBodySearch">
				
			</div>
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
<!-- script custom js -->
<script type="text/javascript" src="{!! url('public/js/ManagePromotion/index.js') !!}"></script>
