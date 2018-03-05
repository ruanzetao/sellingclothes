<!--Set style-->
<div class="container-fluid">
    <!--Select time to statistics-->
    <div>
        <!--select startDay and endDay-->
        <div id="fSetTime" class="frmMenu">
            <div style="display:inline-block;" class="form-inline">
                <div class="form-group">
                    <label class="lblIndex">Từ ngày:</label>
                    <input name="startDay" id="startDay" class="input-date form-control" type="date">
                </div>
                <br class="brNone"/>
                <div class="form-group">
                    <label class="lblIndex">Đến ngày:</label>
                    <input name="endDay" id="endDay" class="input-date form-control" type="date">
                </div>
            </div>
            <div style="display:inline-block;">
                <div style="display:inline-block;position:relative;bottom:4px;left:4px;">
                    <div id="messageValidate" style="font-size:13px; color:orangered"></div>
                    <div>
                        <button type="submit" id="btnStatistics" class="btn btn-success" style="width:auto;height:auto;font-size:13px;display:inline-block;" onclick="getStatistic('{!! url('admin/statictis/nonsellView') !!}')">Thống kê</button>
                        <div id="loaderStatistic" class="loader">.....</div>
                    </div>
                </div>
                <br />
            </div>
            <!--Button click view sales Statistics-->

        </div>
    </div>
    <div id="formStatistic">
        <!--Sales statistic chart and table-->
    </div>
</div>
<!--add references javascript for DateTimePicker-->
<script src="{!! url('public/js/ManageStatistics/revenue.js') !!}"></script>
<script>
    //<!--cript setup dateTime-->
    <?php $date = date('Y-m-d'); $datePre = date('Y-m');?>
    $('#endDay').val('<?php echo $date; ?>');
    $('#startDay').val('<?php echo $datePre; ?>-01');
</script>