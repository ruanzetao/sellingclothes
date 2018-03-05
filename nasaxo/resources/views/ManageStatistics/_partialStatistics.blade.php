<div class="row">
	<div class="col-md-12 headerTable" style="margin-top:35px;">
		<img style="width: 20px;height: 20px;cursor: pointer;" id="changeStyle" src="{!! url('public/images') !!}/Refresh_icon.png" class="pull-left" />
	</div>
	<canvas id="statistic-Chart"></canvas>
</div>

<script type="text/javascript" src="{!! url('public/js/Chart.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/js/ManageHome/mychart.js') !!}"></script>
<script>
    //<!--function paint chart-->
    styleChart="bar";
    var element = document.getElementById("statistic-Chart");
    MyJS_paintStatistics(styleChart, element, <?php echo isset($labels) ? json_encode($labels) :"[]"; ?>,  <?php echo isset($countOrder) ? json_encode($countOrder) :"[]"; ?>, <?php echo isset($totalPrice) ? json_encode($totalPrice) :"[]"; ?> );
    // <!--change style of chart bar or line-->
    $("#changeStyle").click(function(){
    	styleChart=styleChart=="bar"?"line":"bar";
    	MyJS_paintStatistics(styleChart, element, <?php echo isset($labels) ? json_encode($labels) :"[]"; ?>,  <?php echo isset($countOrder) ? json_encode($countOrder) :"[]"; ?>, <?php echo isset($totalPrice) ? json_encode($totalPrice) :"[]"; ?> );
    })
    //<!--Event onclick point in chart-->
    document.getElementById("statistic-Chart").onclick=function(evt){
    	var activePoints = tempChart.getElementsAtEvent(evt);
    	var firstPoint = activePoints[0];
    	if(firstPoint==null) return;
    //My event: do anything with lable,  activePoints[0] -> data 1; activePoints[1] -> data 2
    //gotoInfomationStatistic(label);
};
</script>