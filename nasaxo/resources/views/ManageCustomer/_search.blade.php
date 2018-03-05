<!-- Modal -->
<div class="modal fade" id="CustomerModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content Customer-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Nội dung tin nhắn</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="">
					<div class="form-group">
						<label class="control-label col-sm-3" for="pwd">Mô tả:</label>
						<div class="col-sm-9"> 
							<div class="input-group col-sm-12">
								<span class="input-group-addon"><i class="fa fa-comment" aria-hidden="true"></i></span>
								<textarea class="form-control txtDescription" id="inputDescriotionSend" placeholder="Nhập nội dung tin nhắn"></textarea>
							</div>        
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="btnSubmitModel" type="button" class="btn btn-info" data-dismiss="modal">Chấp nhận</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
			</div>
		</div>

	</div>
</div>
<!-- end modals -->
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
				<th class="table-Sort" data-sort="STT" style="width: 10%;">STT</th>
				<th class="table-Sort" data-sort="Name" style="width: 20%;">khách hàng</th>
				<th class="table-Sort" data-sort="Email" style="width: 20%;">Thư điện tử</th>
				<th class="table-Sort" data-sort="DeliveryPlace" style="width: 20%;">Địa chỉ giao hàng</th>
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
    <?php if(isset($listUser)){ ?>
    	<?php foreach ($listUser as $key => $value) { ?>
    		{
    			"data":{
    				"STT":"<?php echo $key+1; ?>",
    				"Name":"<?php echo $value->Username; ?>",
    				"Email":"<?php echo $value->Email; ?>",
    				// lấy địa chỉ sản phẩm
    				<?php 
    				$Place = "";
    				$deliveryPlace = $value->DeliveryPlace()->get();
    				if(isset($deliveryPlace[0])){
    					$Place=$deliveryPlace[0]->ReceiveName.' - '.$deliveryPlace[0]->DeliveryPlaces ;
    				}
    				?>
    				"DeliveryPlace":"<?php echo $Place; ?>",
    				"Description":"<?php echo $value->Description; ?>",
    				"Action":"<i data-send='<?php echo $value->id; ?>' class='sendEmail fa fa-paper-plane fa-2x' aria-hidden='true' title='Gửi tin nhắn'>"
    		},
    		"flag":0
    	},
    	<?php } ?>
    	];
    	<?php } ?>
    </script>
    <!-- table sort -->
    <script type="text/javascript" src="{!! url('public/js/table-sort/PagingTable.js') !!}"></script>
    <script type="text/javascript" src="{!! url('public/js/ManageCustomer/search.js') !!}"></script>
