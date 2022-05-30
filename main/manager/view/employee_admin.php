
<?php

use Cassandra\Date;

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
$today = (float) date('d');
$time= $today - 1;
$sql = "SELECT
 admin.id,
 admin.name,
 admin.email,
 admin.adress,
 admin.gender,
 admin.birthday,
 admin.number_phone,
 admin.password,
 SUM(if(DATE(time) = CURDATE(), 1, 0)) as 'today',
 SUM(if(DATE(time) >= CURDATE() - INTERVAL '$time' DAY, 1, 0)) as '30_days',
 count(*) as tong
 from admin 
 LEFT join bill
 on (
     admin.id = bill.id_admin
     and bill.id_status > 1
 )
 where 
 level = 1
 group by admin.id";
$result = mysqli_query($connect, $sql);
?>

<table border="1" width="100%">

    <tr>

        <th  colspan="6">
            <h2>
                Thống kê số lượng đơn ADMIN đã duyệt
            </h2>
        </th>
    </tr>
    <tr>
        <th>
            Tên
        </th>
        <th>
            Hôm nay
        </th>
        <th>
            Tháng nay
        </th>
        <th>
            Tổng đơn đã duyệt
        </th>
        <th>
            Chỉ tiêu tháng này
        </th>
    </tr>
    <?php   foreach ($result as $each) : ?>
        <tr>
            <th>
                <?php echo $each['name'] ?>
            </th>

            <th>
                <?php echo $each['today'] ?>
            </th>
            <th>
                <?php echo $each['30_days'] ?>
            </th>
            <th>
                <?php echo $each['tong'] ?>
            </th>
            <th>
                <?php
                $a = $each['30_days'];
                if($a < "1050"){
                    echo "Chưa đạt";
                } else{
                    echo "Đạt";
                }
                ?>
            </th>
        </tr>
    <?php endforeach  ?>
   <tr>
    <th  colspan="6">
        <h4>
            KPI / Tháng > 1050 đơn : Đạt
            <br>
            KPI / Tháng < 1050 đơn : Chưa đạt
        </h4>
    </th>

    </tr>

</table>
<?php
    include('admin/index.php')
?>
  