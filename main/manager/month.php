<?php  
  require '../../connect.php';
  $sam = $_GET['days'];
 $this_month = date('m');
 $day_of_this_month = (new DateTime())-> format('t');

 $sql = "select 
 date_format(time,'%m') as 'tháng',
 count(*) as 'số đơn'
 from bill
 where id_status = 3 
 group by date_format(time,'%m')";
 $result = mysqli_query($connect,$sql);
 $arr2 = [];
 foreach($result as $each){
    $month = $each['tháng'];
  $arr2[$month] = [
         'name' =>  $month,
         'y' => (float)$each['số đơn'],
         'drilldown' => $month,
  ];
  }

 $sql2 = "select 
 date_format(time,'%m') as 'tháng',
 sum(total_price) as 'doanh thu'
 from bill
 where id_status = 3 
 group by date_format(time,'%m')";
 $result2 = mysqli_query($connect,$sql2);
 $arr4 = [];

   foreach($result2 as $each){
       $month = $each['tháng'];
     $arr4[$month] = [
        'name' =>  $month,
        'y' => (float)$each['doanh thu'],
        'drilldown' => $month 
 ];
     }
 $arr3 = [];
     foreach( $arr2 as $month => $each){
         $arr3[$month] = [
             'name' => $each['name'],
             'id' => $month, 
             'yAxis'=> 1,
         ];
         $arr5[$month] = [
             'name' => $each['name'],
             'id' => $month 

         ];
         $arr3[$month]['data'] = [];
         $arr5[$month]['data'] = [];
         $number = cal_days_in_month(CAL_GREGORIAN, $each['name'] , 2022);
         $dayy = '2022' . '-' . $month . '-' . $number;
         $da = '2022' . '-' . $month . '-' . '1';
        
        //  exit;
for( $i = 1; $i <= $number; $i ++){
                $key = $i . '-' . $month;
                // echo $key;
                // exit;
                    $sql = "select 
            date_format(time,'%e-%m') as 'ngày', 
            count(*) as 'số đơn'
            from bill
            where id_status = 3 
            and date_format(time,'%e-%m') = '$key'
            group by date_format(time,'%e-%m') ";
            $result3 = mysqli_query($connect,$sql); 
                
            foreach($result3 as $each){
                $dddd = $each['ngày'];
               
            
                
                $arr3[$month]['data'][] = [
                    $key,
                   (float)$each['số đơn']
                ];
              }

              $sql = "select 
              date_format(time,'%e-%m') as 'ngày', 
              sum(total_price) as 'doanh thu'
              from bill
              where id_status = 3 
              and date_format(time,'%e-%m') = '$key'
              group by date_format(time,'%e-%m') ";
              $result4 = mysqli_query($connect,$sql); 
                  
              foreach($result4 as $each){
                  $dddd = $each['ngày'];
                 
              
                  
                  $arr5[$month]['data'][$dddd] = (float)$each['doanh thu'];
                }
              }
     }
$object = [$arr2,$arr4,$arr3,$arr5];
    
    echo json_encode($object);
//  echo json_encode($arr2);
//  echo json_encode($arrrr);


