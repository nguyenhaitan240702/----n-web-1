<?php
 require '../../connect.php';
$this_month = date('m');

$sql = "select count(*) from bill where date_format(time,'%m') = '$this_month'";
$b = mysqli_query($connect,$sql);
$r_b = mysqli_fetch_array($b)['count(*)'];

$sql = "select count(*) from bill where id_status = 4 and date_format(time,'%m') = '$this_month'";
$a = mysqli_query($connect,$sql);
$r_a = mysqli_fetch_array($a)['count(*)'];

$r_c = $r_b - $r_a ;
$r_ab = ($r_a/$r_b)*100;
$r_cb = ($r_c/$r_b)*100;

?>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script>

Highcharts.chart('container-2', {
chart: {
  type: 'pie',
  options3d: {
    enabled: true,
    alpha: 45,
    beta: 0
  }
},
title: {
  text: 'Tỉ lệ hủy đơn hàng'
},
accessibility: {
  point: {
    valueSuffix: '%'
  }
},
tooltip: {
  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
},
plotOptions: {
  pie: {
    allowPointSelect: true,
    cursor: 'pointer',
    depth: 35,
    dataLabels: {
      enabled: true,
      format: '{point.name}'
    }
  }
},
series: [{
  type: 'pie',
  name: 'Tỉ lệ',
  data: [
   
    ['Đơn thành công', <?php echo $r_cb ?>],
    ['Hủy đơn', <?php echo $r_ab ?>]
  ]
}]
});
  </script>