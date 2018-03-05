<!-- start table -->
<div id='table-content' class="table-content">
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
				<th class="table-Sort" data-sort="STT" style="width: 25%;">STT</th>
				<th class="table-Sort" data-sort="Name" style="width: 25%;">Nhóm sản phẩm</th>
				<th style="width: 30%;">Mô tả</th>
				<th style="width: 20%;"></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<!-- end table -->
	<!-- start footer table -->
	<div class="Table-Pagination pull-right">
	</div>
	<!-- end footer table -->
</div>
<!-- end table -->
<!-- end container -->
<script type="text/javascript">
	// set attr of col in table
    // set data of table
    var listDataTable = [
    <?php if(isset($listCategory)){ ?>
    	<?php foreach ($listCategory as $key => $value) { ?> 
    		{
    			'data':{
    				'id':"<?php echo $value->id; ?>",
    				'STT':"<?php echo $key+1; ?>",
    				'Name':"<?php echo $value->Name; ?>",
    				'Description':"<?php echo $value->Description; ?>",
    				'Action':"<i data-edit='<?php echo $value->id; ?>' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='<?php echo $value->id; ?>' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>"
    			},
    			'flag':0
    		},
    		<?php } ?> 
    		<?php } ?>
    		];
    	</script>
    	<!-- table sort -->
    	<script type="text/javascript" src="{!! url('public/js/table-sort/PagingTable.js') !!}"></script>
    	<script type="text/javascript" src="{!! url('public/js/ManageProductCategory/_search.js') !!}"></script>
