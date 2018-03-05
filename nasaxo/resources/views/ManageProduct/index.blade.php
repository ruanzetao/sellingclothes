<!-- my custom -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/ManageProduct/index.css') !!}">
<!-- Modal -->
<div class="modal fade" id="ProductModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content product-->
		<div class="modal-content" style="z-index: 10;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thông tin sản phẩm</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="">
					<div class="form-group">
						<label class="control-label col-sm-3" for="txtCategory">Nhóm sản phẩm:</label>
						<div class="col-xs-9">
							<div class="input-group col-sm-12">
								<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
								<input type="hidden" class="form-control" id="txtIdCategory">
								<input type="text" class="form-control" id="txtCategory">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="Product">Sản phẩm:</label>
						<div class="col-xs-9">
							<div class="input-group col-sm-12">
								<span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
								<input type="text" class="form-control" id="Product" name="Product">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="txtColor">Màu sắc:</label>
						<div class="col-xs-9">
							<div class="inputPictureGroup ">
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id="txtColor">
								</div>
								<div id="groupColors">

								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="txtSize">Kích thước:</label>
						<div class="col-xs-9" >
							<div class="inputPictureGroup ">
								<div class="input-group col-sm-12">
									<span class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id="txtSize">
								</div>
								<div id="groupSizes">

								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="priceProduct">Giá:</label>
						<div class="col-xs-9">
							<div class="input-group col-sm-12">
								<span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
								<input type="text" class="form-control" id="priceProduct" name="priceProduct">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="discountProduct">Khuyến mãi:</label>
						<div class="col-xs-9">
							<div class="input-group col-sm-12">
								<span class="input-group-addon"><i class="fa fa-bomb" aria-hidden="true"></i></span>
								<input type="text" class="form-control" id="discountProduct" name="discountProduct" placeholder="Nhập khuyến mãi (%)">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="inputPictureGroup">Hình ảnh:</label>
						<div class="col-sm-9">
							<div id="inputPictureGroup" class="inputPictureGroup col-sm-12">
								<span class="input-Img"><i class="fa fa-plus" aria-hidden="true"></i></span>
								<input type="file" name="inputPicture" class="inputPicture" multiple style="display: none;">
								<div id="groupPicture" class="groupPicture">

								</div>
							</div>        
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="inputDescriotion">Mô tả:</label>
						<div class="col-sm-9"> 
							<div class="input-group col-sm-12">
								<span class="input-group-addon"><i class="fa fa-comment" aria-hidden="true"></i></span>
								<textarea class="form-control txtDescription" id="inputDescriotion" placeholder="Nhập mô tả sản phẩm"></textarea>
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
<div class="container-fluid">

	<!-- start row -->
	<div class="row">
		<div class="col-xs-12 header-content">
			<div class="col-md-4">
				<button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#ProductModal">+</button>
				<div class="form-inline col-md-12">
					<div class="form-group pull-left col-md-12">
						<div class="input-group">
							<input id="inputSearch" type="text" class="form-control" placeholder="Tìm kiếm...">
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
<script type="text/javascript" src="{!! url('public/js/ManageProduct/index.js') !!}"></script>
