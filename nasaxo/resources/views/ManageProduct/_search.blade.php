<!-- table-sort -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/table-sort/PagingTable.css') !!}">
<!-- model detail prict -->
<div class="modal fade" id="PriceDetailModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content product-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thông tin giá</h4>
			</div>
			<div class="modal-body">
				<div id='tablePrice'>
					<!-- count entries -->
					<label class="pull-left">Show
						<select  class="input-sm Pagin-ShowEntries">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
						entries
					</label>
					<!--end count entries -->
					<!-- start search -->
					<div class="pull-right">
						<div class="form-inline">
							<div class="form-group pull-right">
								<div class="input-group">
									<input type="text" class="form-control Pagin-inputSearch" placeholder="Tìm kiếm...">
									<div class="btn btn-default input-group-addon Pagin-btnSearch">
										<i class="glyphicon glyphicon-search"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end search -->
					<!-- start table -->
					
					<table class="Table-Pagin table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th class="table-Sort" data-sort="STT" style="width: 10%;">STT</th>
								<th class="table-Sort" data-sort="StartDay" style="width: 25%;">Ngày bắt đầu</th>
								<th class="table-Sort" data-sort="EndDay" style="width: 25%;">Ngày kết thúc</th>
								<th class="table-Sort" data-sort="Price" style="width: 20%;">Giá</th>
								<th class="table-Sort" data-sort="Discount" style="width: 20%;">Giảm giá</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<!-- end table -->
					<!-- start footer table -->
					<div class="Table-Pagination">
					</div>
					<!-- end footer table -->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
			</div>
		</div>
	</div>
</div>
<!-- end model -->
<!-- start table -->
<div id='table-content' class="table-content col-xs-12">
	<!-- count entries -->
	<label class="pull-left">Show
		<select  class="input-sm Pagin-ShowEntries">
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="20">20</option>
			<option value="50">50</option>
			<option value="100">100</option>
		</select>
		entries
	</label>
	<!--end count entries -->
	<!-- start search -->
	<div class="pull-right">
		<div class="form-inline">
			<div class="form-group pull-right">
				<div class="input-group">
					<input type="text" class="form-control Pagin-inputSearch" placeholder="Tìm kiếm...">
					<div class="btn btn-default input-group-addon Pagin-btnSearch">
						<i class="glyphicon glyphicon-search"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search -->
	<!-- start table -->
	<table class="Table-Pagin table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th class="table-Sort" data-sort="STT" style="width: 8%;">STT</th>
				<th style="width: 15%;">Hình ảnh</th>
				<th class="table-Sort" data-sort="Name" style="width: 17%;">Sản phẩm</th>
				<th class="table-Sort" data-sort="ProductCategory" style="width: 15%;">Nhóm sản phẩm</th>
				<th class="table-Sort" data-sort="Price" style="width: 15%;">Giá</th>
				<th class="table-Sort" data-sort="Description" style="width: 20%;">Mô tả</th>
				<th style="width: 10%;"></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<!-- end table -->
	<!-- start footer table -->
	<div class="Table-Pagination">
	</div>
	<!-- end footer table -->
</div>
<!-- end table -->
<script type="text/javascript">
// set attr of col in table

// set data of table
var listDataTable = [
<?php if(isset($listProduct)){ ?>
	<?php foreach ($listProduct as $key => $value): ?>
	{
		"data":{
			'id':"<?php echo $value->id; ?>",
			'STT':'<?php echo $key+1; ?>',
			<?php $listPicture = $value->Pictures()->get() ?>
			'Picture':'<?php foreach ($listPicture as $key => $valuePicture): ?><img class="img-product" src="{!! url("public/images/") !!}/<?php echo $valuePicture->Url; ?>"><?php endforeach ?>',
			'Name':"<?php echo $value->Name; ?>",

			<?php $Catrgory = $value->ProductCategory()->get(); ?>
			'ProductCategory':"<?php echo $Catrgory[0]->Name; ?>",

			<?php $price = $value->Prices()->whereNull('EndDate')->get()[0]; ?>
			'Price':"<?php echo $price->Price; ?>",

			'Description':"<?php echo $value->Description; ?>",

			'Action':"<i data-edit='<?php echo $value->id; ?>' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='<?php echo $value->id; ?>' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>"

		},
		"flag":0
	},
	<?php endforeach; ?>
	<?php } ?>
	];
</script>
<!-- table sort -->
<script type="text/javascript" src="{!! url('public/js/table-sort/PagingTable.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/js/ManageProduct/_search.js') !!}"></script>
