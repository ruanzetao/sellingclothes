<!-- table-sort -->
<link rel="stylesheet" type="text/css" href="{!! url('public/css/table-sort/PagingTable.css') !!}">
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
				<th class="table-Sort" data-sort="CreateDate" style="width: 10%;">Ngày tạo</th>
				<th style="width: 20%;">Khách hàng</th>
				<th style="width: 20%;">Sản phẩm</th>
				<th class="table-Sort" data-sort="totalOrder" style="width: 10%;">Tổng tiền</th>
				<th class="table-Sort" data-sort="Discount" style="width: 20%;">Giảm giá</th>
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
<?php if(isset($listOrder)){ ?> 
	<?php foreach ($listOrder as $key => $value) { ?>
		{
			"data":{
				"id":"<?php echo $value->id; ?>",
				"STT":"<?php echo $key+1; ?>",

				"CreateDate":"<?php $date = strtotime($value->CreateDate);
				$new_date = date('d-m-Y', $date); echo $new_date; ?>",

				// lấy thong tin khách hàng của hóa đơn
				<?php 
				$nameUser = "";
				$namePlace = [];
				$UserOrder =$value->User()->get();
				if(isset($UserOrder[0])){
					$nameUser=$UserOrder[0]->Username;
					$DeliveryPlace = $UserOrder[0]->DeliveryPlace()->get();
					if(isset($DeliveryPlace[0])){
						$namePlace[] = $DeliveryPlace[0]->ReceiveName;
						$namePlace[] = $DeliveryPlace[0]->NumberPhone;
						$namePlace[] = $DeliveryPlace[0]->DeliveryPlaces;
					}
				}
				?>
				"custommer":"<?php echo "Tài khoản: $nameUser<br>".implode(" - ",$namePlace) ?>",

				<?php $listOrderProduct = $value->OrderProduct()->get();
				$viewProduct = '';
				$products = [];
				$sumprice =0;
				foreach ($listOrderProduct as $valueOrderDetail) {
					$result = [];
					$result[] = $valueOrderDetail->Count;
					$product = $valueOrderDetail->Product()->get()[0];
					$result[] = $product->Name;
							// tính toán tiền
					$price=	$product->Prices()->Where([['StartDate','<=',$value->CreateDate],['EndDate','<',$value->CreateDate]])->orWhere([['StartDate','<=',$value->CreateDate],['EndDate','=',null]])->get(); 
					$pricefinal=0;
							// tính toán tiền
					if(count($price)>0){
						$pricefinal  =$price[0]['Price'] -( $price[0]['Price'] * ($price[0]['Discount'] /100));
					}
					$sumprice +=$pricefinal*$valueOrderDetail->Count;
					$result[] = $pricefinal . ' VNĐ';
					$products[] =implode('__',$result);
				}
				$viewProduct = implode('<br><br>',$products);
				?>
				"Products":"<?php echo $viewProduct; ?>",

				"totalOrder":"<?php echo $sumprice;?>",

				<?php $promotion = $value->OrderPromotion()->get()[0]; ?>
				"Discount":"<?php echo ($sumprice*$promotion->Discount/100); ?>",

				"Action":"<i style='cursor:pointer;' class='doneOrder fa fa-check-square-o fa-2x' aria-hidden='true' title='Xác nhận' data-done='<?php echo $value->id; ?>'></i><br><i style='cursor:pointer;color:#D74242;' class='deleteOrder fa fa-trash-o fa-2x' aria-hidden='true' title='Hủy đơn hàng' data-delete='<?php echo $value->id; ?>'></i> "
			},
			"flag":0

		},
		<?php } ?>
		<?php } ?>
		];
	</script>
	<!-- table sort -->
	<script type="text/javascript" src="{!! url('public/js/table-sort/PagingTable.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/js/ManageOrder/confirm.js') !!}"></script>
