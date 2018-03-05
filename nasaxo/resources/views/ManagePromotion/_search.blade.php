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
				<th class="table-Sort" data-sort="STT" style="width: 10%;">STT</th>
				<th class="table-Sort" data-sort="StartDay" style="width: 12%;">Ngày bắt đầu</th>
				<th class="table-Sort" data-sort="EndDay" style="width: 12%;">Ngày kết thúc</th>
				<th class="table-Sort" data-sort="Name" style="width: 16%;">Tên</th>
				<th class="table-Sort" data-sort="Discount" style="width: 11%;">Giảm giá (%)</th>
				<th class="table-Sort" data-sort="BasePurchare" style="width: 16%;" title="Số tiền ít nhất để đạt khuyến mãi">Yêu cầu</th>
				<th class="table-Sort" data-sort="Description" style="width: 14%;">Mô tả</th>
				<th style="width: 9%;"></th>
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
    <?php if(isset($listPromotion)){
    	$i = 0;
    	foreach ($listPromotion as $key => $value) { ?>
    		{
    			"data":{
    				"id":"<?php echo $listPromotion[$key]['id']; ?>",
    				"STT":"<?php echo $key+1;  ?>",
    				"Picture":"<?php echo $listPromotion[$key]['Picture']; ?>",
    				"StartDay":"<?php echo $listPromotion[$key]['StartDate'];  ?>",
    				"EndDay":"<?php echo $listPromotion[$key]['EndDate'];  ?>",
    				"Name":"<?php echo $listPromotion[$key]['Name'];  ?>",
    				"Discount":"<?php echo $listPromotion[$key]['Discount'];  ?>",
    				"BasePurchare":"<?php echo $listPromotion[$key]['BasePurchase'];  ?>",
    				"Description":"<?php echo $listPromotion[$key]['Description'];  ?>",
    				"Action":"<i data-edit='<?php echo $listPromotion[$key]['id']; ?>' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='<?php echo $listPromotion[$key]['id']; ?>' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>"
    			},
    			"flag":0
    		},
    		<?php }
    	} ?>
    	];
    </script>
    <!-- table sort -->
    <script type="text/javascript" src="{!! url('public/js/table-sort/PagingTable.js') !!}"></script>
    <script type="text/javascript" src="{!! url('public/js/ManagePromotion/_search.js') !!}"></script>
