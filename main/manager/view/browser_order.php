<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
$sql = "select 
    bill.*,
    customer.name as customer_name
    from bill
    join customer
    on customer.id = bill.id_customer
    where id_status = '1'
    order by 
    time 
    asc
    ";
$result = mysqli_query($connect , $sql);

?>
<table border="1" width="100%">
    <tr>
        <th>Mã </th>
        <th>Thời gian đặt hàng</th>
        <th>Thông tin người nhận</th>
        <th>Thông tin người đặt</th>
        <th>Ghi nhớ</th>
        <th>Trạng thái</th>
        <th>Tổng tiền</th>
        <th>Chi tiết</th>
        <th>Duyệt</th>
    </tr>



    <?php
    //if (is_array($result)) {

    foreach ($result as $each) : ?>
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php
            $date=date_create($each['time']);
            echo date_format($date,"H:i:s  d-m-Y ")
            ?>
            </td>
            <td>
              Tên:  <?php echo $each['name'] ?><br>
              SĐT:  <?php echo $each['number_phone'] ?><br>
              Địa chỉ:  <?php echo $each['adress'] ?>
            </td>
            <td>
                <?php echo $each['customer_name'] ?><br>
            </td>
            <td>
                <?php echo $each['notes'] ?>
            </td>
            <td>
                <?php
                switch($each ['id_status']){
                    case'1' :
                        echo"Đang chờ";
                        break;
                    case'2' :
                        echo"Đang giao hàng";
                        break;
                    case'3' :
                        echo"Giao thành công";
                        break;
                    case'4' :
                        echo"Đã hủy";
                        break;
                }
                ?>
            </td>
            <td>
                <?php  echo number_format( $each['total_price'] , 0, '', ',') ?> đ

            </td>
            <td>
                <a href="?statistical=detail_order&id=<?php echo $each['id'] ?>&id_cus=<?php echo $each['id_customer'] ?>">
                    Xem
                </a>
            </td>
            <td>
                <a href="?statistical=browser_order&id=<?php echo $each['id'] ?>">
                    Duyệt
                </a>
            </td>
        </tr>

    <?php endforeach ?>
    <?php   ?>
</table>
</body>
</html>