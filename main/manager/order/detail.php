<?php
$id_bill = $_GET['id'];
$id_customer = $_GET['id_cus'];
$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
$sql = "select * from 
    bill_detail
    join products on products.id = bill_detail.id_product
    where id_bill = '$id_bill'";
$result = mysqli_query($connect , $sql);
$sql = "select * from customer where id = '$id_customer'";
$resultt = mysqli_query($connect , $sql);
$eachh = mysqli_fetch_array($resultt);
$sum = 0 ;
//  die("$sql");
?>
<h2>
    Thông tin sản phẩm
</h2>
<table border="1" width="100%">

    <tr>
        <th>Ảnh </th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
    </tr>
    <?php foreach($result as $each):?>
        <tr>
            <td>
                <img height='100' src="images/<?php echo $each['images']?> ">
            </td>
            <td><?php echo $each['name']?></td>
            <td><?php  echo number_format( $each['price'] , 0, '', ',') ?> đ</td>
            <td>
                <?php echo $each['quantity']?>
            </td>
            <td>
                <?php
                $result = $each['price'] * $each['quantity'];
                echo number_format( $result , 0, '', ',')  ;
                $sum += $result;
                ?> đ
            </td>
        </tr>
    <?php endforeach ?>
</table >
<h2>
    Thông tin người đặt
</h2>
<table border="1" width="100%">
    <tr>
        <th>Tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
    </tr>
    <tr>
        <td><?php echo $eachh['name'] ?></td>
        <td><?php echo $eachh['gender'] ?></td>
        <td><?php echo $eachh['birthday'] ?></td>
        <td><?php echo $eachh['number_phone'] ?></td>
        <td><?php echo $eachh['email'] ?></td>
        <td><?php echo $eachh['adress'] ?></td>
    </tr>
</table>
<h1>
    Tổng tiền đơn này là <?php echo  number_format( $sum , 0, '', ',') ?> đ
</h1>