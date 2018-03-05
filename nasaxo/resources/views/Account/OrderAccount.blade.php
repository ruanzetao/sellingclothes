<link rel="stylesheet" type="text/css" href="{!! url('/public/css/Account/Order.css') !!}">
<?php 
if(isset($user)){
	$listOrder = $user->Orders()->orderBy('CreateDate','desc')->get();
	?>
	<table class="responstable table-hover">
		<tr>
			<th>STT</th>
			<th>Ngày tạo</th>
			<th>Sản phẩm</th>
			<th>Tổng tiền</th>
			<th>Giảm giá</th>
			<th>Trạng thái</th>
		</tr>
		<?php
		foreach ($listOrder as $key => $value) {?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value->CreateDate; ?></td>
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

			<td><?php echo $viewProduct; ?></td>
			<td><?php echo $sumprice . ' VNĐ'; ?></td>
			<?php $promotion = $value->OrderPromotion()->get()[0]; ?>
			<td><?php echo ($sumprice*$promotion->Discount/100) . ' VNĐ'; ?></td>

			<td>
				<?php 
				if($value->IsDelivered){
					echo 'Đã giao';
				}elseif($value->IsDelete){
					echo 'Hủy';
				}elseif($value->ConfirmDate != null){
					echo 'Đã xác nhận';
				}else{
					echo 'Chưa xác nhận';
				}
				?>
			</td>
		</tr>
		<?php }?> 
	</table>
	<?php 
}else{
	echo 'Không có dử liệu.';
}
?>


