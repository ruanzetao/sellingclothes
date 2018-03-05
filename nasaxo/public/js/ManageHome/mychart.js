//<!--Vẽ biểu đồ-->
tempChart=null;
function MyJS_paintStatistics(styleChart, canvas, lablesStatistics, dataSales, countBill) {
    //<!--Dử liệu data cho biểu đồ-->
    var data = {
    	labels: lablesStatistics,
    	datasets: [{
    		label: 'Tổng tiền',
    		borderColor: "#3e95cd",
    		backgroundColor: '#3e95cd',
    		fill: false,
    		data: dataSales,
    		yAxisID: 'Sales'
    	}, {
    		label: 'Số hóa đơn',
    		borderColor: 'red',
    		backgroundColor: 'red',
    		fill: false,
    		data: countBill,
    		yAxisID: 'turns'
    	}]
    }
    //paint chart 
    var chart = new Chart(canvas.getContext("2d"), {
    	type: styleChart,
    	data: data,
    	options: {
    		title: {
    			display: true,
    			text: "Thống kê Nasaxo"
    		},
    		scales: {
    			yAxes: [{
    				type: 'linear',
    				display: true,
    				position: 'left',
    				id: 'Sales'
    			}, {
    				type: 'linear',
    				display: true,
    				position: 'right',
    				id: 'turns'
    			}]
    		}
    	}
    });
    //delete old chart
    if(window.tempChart!=null){
    	window.tempChart.destroy();
    }
    window.tempChart=chart;
}  