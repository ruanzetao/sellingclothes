//<!--get infomation and get chart-->
//get statistic
function getStatistic($url) {
    //hide loader
    var loaderDiv = document.getElementById('loaderStatistic');
    if (loaderDiv != null) {
        loaderDiv.setAttribute('style', 'display:none');
    }
    var start = $("#startDay").val();
    var end = $("#endDay").val();
    var startDay = start.split("-");
    var endDay = end.split("-");
    if (start === "" || end === "") {
        $("#messageValidate").html("Vui lòng chọn thời gian thống kê");
        return;
    }
    var dateStart = new Date(startDay[0], startDay[1] - 1, startDay[2]);
    var dateEnd = new Date(endDay[0], endDay[1] - 1, endDay[2]);
    if (dateStart.getTime() > dateEnd.getTime()) {
        $("#messageValidate").html("Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc");
        return;
    }
    //load loader
    if (loaderDiv != null) {
        loaderDiv.setAttribute('style', 'display:inline-block');
    }
    $("#messageValidate").html("");
    $.ajax({
        type: "GET",
        data: { startDay: start, endDay: end},
        cache: false,
        url: $url,
        success: function($re) {
            //hide loader
            if (loaderDiv != null) {
                loaderDiv.setAttribute('style', 'display:none');
            }
            $("#formStatistic").html($re);
        }
    });
}