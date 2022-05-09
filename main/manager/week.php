<?php
  require '../../connect.php';
$day = $_GET['day'];
$monday = date("Y-m-d", strtotime('monday this week')) ;
$staticstart = (float)date("d", strtotime('monday this week')) ;
$staticfinish = (float)date("d", strtotime('sunday this week'));
$end_of_week = date("Y-m-d", strtotime('sunday this week'));
$today = date('Y-m-d');
$this_days = date('d-m-Y');
$this_day = date('d');
$first_date = strtotime($monday);
$second_date = strtotime($this_days);
$datediff = abs($first_date - $second_date);
$day_cc = floor($datediff / (60*60*24));

$sql = "select 
date_format(time,'%e-%m-%Y') as 'ngày',
sum(total_price) as 'doanh thu'
from bill
where id_status = 3 
and DATE(time) >= '$today' - INTERVAL '$day_cc' DAY
group by date_format(time,'%e-%m-%Y') asc";
$result = mysqli_query($connect,$sql);


$sql = "select 
date_format(time,'%e-%m-%Y') as 'ngày', 
count(*) as 'số đơn'
from bill
where id_status = 3 
and DATE(time) >= '$end_of_week' - INTERVAL 6 DAY
group by date_format(time,'%e-%m-%Y') asc";
$resultt = mysqli_query($connect,$sql);
$arr = [];
$arrr = [];


$next_month = date("m", strtotime('+1 month')) ;
$last_month = date("m", strtotime('-1 month')) ;
$this_month = date('m');

$this_year = date('Y');
$month_of_monday = date('m',  strtotime('monday this week'));
$day_of_this_month = (new DateTime())-> format('t');
$date = new DateTime();
$date->modify("last day of previous month");

$datee = new DateTime();
$week = $datee->format("W"); 

$day_of_last_month = $date->format("d");


// echo $staticstart;
// echo $staticfinish;

if($day_of_this_month - $staticstart >= 7){
for( $i = $staticstart; $i <= $staticfinish; $i ++){
  $key = $i . '-' . $this_month . '-' . $this_year;
  
  $arrr[$key] = 0;
}
}else{
 if( $month_of_monday == $this_month){
      
      for( $i = $staticstart; $i <= $staticfinish; $i ++){
          $key = $i . '-' . $this_month . '-' . $this_year;
          
          $arrr[$key] = 0;

          }
}else{
  for( $i = $staticstart; $i <=$day_of_last_month; $i ++){
      $key = $i . '-' . $last_month . '-' . $this_year;
     
      $arrr[$key] = 0;
   }

for( $i = 1; $i <= $staticfinish; $i ++){
  $key = $i . '-' . $this_month . '-' . $this_year;
  
  $arrr[$key] = 0;

  }
}
}
if($day_of_this_month - $staticstart >= 7){
for( $i = $staticstart; $i <= $this_day; $i ++){
  $key = $i . '-' . $this_month . '-' . $this_year;
  $arr[$key] = 0;
  
}
}else{
 if( $month_of_monday == $this_month){
      for( $i = $staticstart; $i <=$this_day; $i ++){
              $key = $i . '-' . $this_month . '-' . $this_year;
              $arr[$key] = 0;
              
           }
      
}else{
  for( $i = $staticstart; $i <=$day_of_last_month; $i ++){
      $key = $i . '-' . $last_month . '-' . $this_year;
      $arr[$key] = 0;
    
  }
for( $i = 1; $i <= $this_day; $i ++){
  $key = $i . '-' . $this_month . '-' . $this_year;
  $arr[$key] = 0;
  

  }
}
}

foreach($result as $each){
$arr[$each['ngày']] = (float)$each['doanh thu'];
}
foreach($resultt as $each){
$arrr[$each['ngày']] = (float)$each['số đơn'];
}
$object = [$arr,$arrr];
echo json_encode($object); 
