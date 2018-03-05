<!-- table-sort -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/table-sort/PagingTable.css') !!}">
<!-- my custom -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/ManageColor/index.css') !!}">
<!-- Modal -->
<div class="modal fade" id="colorModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thông tin màu sắc</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="">
					<div class="form-group">
						<label class="control-label col-sm-2" for="color">Màu sắc:</label>
						<div class="col-xs-10">
							<input type="color" class="form-control" id="color" name="color" value="#ffffff">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Mô tả:</label>
						<div class="col-sm-10"> 
							<div class="input-group col-sm-12">
								<span class="input-group-addon"><i class="fa fa-comment" aria-hidden="true"></i></span>
								<textarea class="form-control txtDescription" id="inputDescriotion" placeholder="Nhập mô tả màu sắc"></textarea>
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
				<!-- add buttom -->
				<button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#colorModal">+</button>
				<div class="form-inline">
					<div class="form-group pull-left col-md-12">
						<div class="input-group">
							<input id="inputColorSearch" type="text" class="form-control" placeholder="">
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
<script type="text/javascript" src="{!! url('public/js/ManageColor/index.js') !!}"></script>
<!-- data table -->

