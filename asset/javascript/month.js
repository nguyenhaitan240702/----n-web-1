$('#container-3').ready(function () {
    const days = 30;
    $.ajax({
      url: "month.php",
      data: {days},
      dataType: "json",
      success: function (response) {
        const arrXX = Object.values(response[0]);
        const arrYY = Object.values(response[1]);
        const arrAA =[];
        Object.values(response[3]).forEach((each)=>{
             each.data = Object.values(each.data);
             arrAA.push(each);
         });
        const arrZZ=[];
         Object.values(response[2]).forEach((each)=>{
             each.data = Object.values(each.data);
             arrZZ.push(each);
         });
      //   console.log(Object.values(response));
      getchart(arrXX,arrYY,arrZZ,arrAA);
       
      }
      
    });
  
  function getchart(arrXX,arrYY,arrZZ,arrAA){
       Highcharts.chart('container-3', {
          chart: {
          type: 'column'
          },
          title: {
          align: 'left',
          text: 'Doanh thu năm '
          },
          subtitle: {
          align: 'left',
          text: 'Nhấn vô cột để hiển thị chi tiết doanh thu tháng'
          },
          accessibility: {
          announceNewData: {
          enabled: true
          }
          },
          xAxis: {
          type: 'category'
          },
          yAxis:  [{ // Primary yAxis
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
          legend: {
          enabled: false
          },
          plotOptions: {
          series: {
          borderWidth: 0,
          dataLabels: {
           enabled: true,
           format: '{point.y:f}'
          }
          }
          },
          
          tooltip: {
          shared: false,
          },
          
          series: [
          {
           name: "Số đơn", 
           yAxis: 1,
          colorByPoint: false,
          tooltip: {
                 valueSuffix: ' Đơn'
             },
          data: arrXX
          },
          {
          name: 'Doanh thu',
          type: 'line',
          tooltip: {
                 valueSuffix: ' Đ'
             },
          data: arrYY
          
          }
          ],
          drilldown: {
          breadcrumbs: {
          position: {
           align: 'right'
          }
          },
          series: arrZZ
          }
          });
  }
  });