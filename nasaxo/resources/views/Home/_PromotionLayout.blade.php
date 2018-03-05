<?php if(isset($promotions) && $promotions!=null && count($promotions)>0){ $liItem =0;$imageItem =0;?>
<div id="carousel-id" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php for($i=0;$i<count($promotions);$i++) {
			if($i<=0){
				?>
				<li data-target="#carousel-id" data-slide-to="<?php echo $i; ?>" class="active"></li>
				<?php 
			}else{
				?>
				<li data-target="#carousel-id" data-slide-to="<?php echo $i; ?>" class=""></li>
				<?php
			}
			?>
			<?php
		} ?>
	</ol>
	<div class="carousel-inner">
		<?php foreach ($promotions as $value) {
			if($liItem==0){$liItem++;
				?>
				<div class="item active">
					<img  src="{!! url('public/images') !!}<?php
					$picture = $value->Pictures()->get()->toArray();
					if(isset($picture[0])){
						echo '/'.$picture[0]['Url'];
					}
					?>" class="img-responsive">
				</div>
				<?php 
			}else{
				?>
				<div class="item">
					<img  src="{!! url('public/images') !!}<?php
					$picture = $value->Pictures()->get()->toArray();
					if(isset($picture[0])){
						echo '/'.$picture[0]['Url'];
					}
					?>" class="img-responsive">
				</div>
				<?php 
			}
			?>
			<?php
		} ?>
	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>	
<?php 
} 
?>
