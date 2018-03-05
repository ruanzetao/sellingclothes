<!-- table-sort -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/table-sort/PagingTable.css') !!}">
<!-- my custom -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/ManageCustomer/index.css') !!}">

<!-- start container -->
<div class="container-fluid">
	<!-- start row -->
	<div class="row">
		<div class="col-xs-12 header-content">
			<div class="col-md-4">
				<div class="form-inline col-md-12">
					<div class="form-group pull-left col-md-12">
						<div class="input-group">
							<input id="inputSearch" type="text" class="form-control" placeholder="Nhập MKH hoặc email">
							<div class="btn btn-default input-group-addon" id="btnSearch">
								<i class="glyphicon glyphicon-search"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="contentBodySearch">
		<!-- nội dung giá trị trả về -->
		</div>
		
	</div>
	<!-- end row -->
</div>
<!-- end container -->

<!-- script custom js -->
<script type="text/javascript" src="{!! url('public/js/ManageCustomer/index.js') !!}"></script>
