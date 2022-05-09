$('#containerr').ready(function () {
    const day = 7;
    $.ajax({
      url: "week.php",
      data: {day},
      dataType: "json",
      success: function (response) {
        const arrX = Object.values(response[0]);
        const arrY = Object.values(response[1]);
        const arrA =Object.keys(response[1]);
      getchart(arrX,arrY,arrA);
       
      }
      
    });
  
  function getchart(arrX,arrY,arrA){
    Highcharts.chart('containerr', {
        chart: {
        zoomType: 'xy'
        },
        title: {
        text: 'Thống kê doanh thu của tuần ' 
        }, 
        xAxis: [{
        categories: arrA,
        crosshair: true
        }],
        yAxis: [{ // Primary yAxis
        labels: {
            format: '{value} đ',
            style: {
            color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Doanh thu',
            style: {
            color: Highcharts.getOptions().colors[1]
            }
        }
        }, { // Secondary yAxis
        title: {
            text: 'Số đơn',
            style: {
            color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} đơn',
            style: {
            color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
        }],
        tooltip: {
        shared: true
        },
        legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
        },
        series: [{
        name: 'Số đơn',
        type: 'column',
        yAxis: 1,
        data: arrY,
        tooltip: {
            valueSuffix: ' Đơn'
        }
    
        }, {
        name: 'Doanh thu',
        type: 'spline',
        data:arrX,
        tooltip: {
            valueSuffix: 'đ'
        }
        }]
    });
  }
  });