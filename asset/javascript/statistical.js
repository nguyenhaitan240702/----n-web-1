$(document).ready(function () {
  const days = 30;
  $.ajax({
    url: "month.php",
    data: {days},
    dataType: "json",
    success: function (response) {
      console.log(response)

//       Highcharts.chart('container-3', {
//         chart: {
//         type: 'column'
//         },
//         title: {
//         align: 'left',
//         text: 'Doanh thu năm '
//         },
//         subtitle: {
//         align: 'left',
//         text: 'Nhấn vô cột để hiển thị chi tiết doanh thu tháng'
//         },
//         accessibility: {
//         announceNewData: {
//         enabled: true
//         }
//         },
//         xAxis: {
//         type: 'category'
//         },
//         yAxis:  [{ // Primary yAxis
//            labels: {
//                format: '{value} đ',
//                style: {
//                color: Highcharts.getOptions().colors[1]
//                }
//            },
//            title: {
//                text: 'Doanh thu',
//                style: {
//                color: Highcharts.getOptions().colors[1]
//                }
//            }
//            }, { // Secondary yAxis
//            title: {
//                text: 'Số đơn',
//                style: {
//                color: Highcharts.getOptions().colors[0]
//                }
//            },
//            labels: {
//                format: '{value} đơn',
//                style: {
//                color: Highcharts.getOptions().colors[0]
//                }
//            },
//            opposite: true
//            }],
//         legend: {
//         enabled: false
//         },
//         plotOptions: {
//         series: {
//         borderWidth: 0,
//         dataLabels: {
//          enabled: true,
//          format: '{point.y:f}'
//         }
//         }
//         },
        
//         tooltip: {
//         shared: false,
//         },
        
//         series: [
//         {
//          name: "Browsers", 
//          yAxis: 1,
//         colorByPoint: false,
//         tooltip: {
//                valueSuffix: ' Đơn'
//            },
//         data: []
//         },
//         {
//         name: 'Doanh thu',
//         type: 'line',
//         tooltip: {
//                valueSuffix: ' Đ'
//            },
//         data: [200000, 500000, 400000],
        
//         }
//         ],
//         drilldown: {
//         breadcrumbs: {
//         position: {
//          align: 'right'
//         }
//         },
//         series: [
//         {
//          name: "Chrome",
//          id: "Chrome",
//          data: [
           
//          ]
//         }
//         ]
//         }
//         });
    }
  });
});