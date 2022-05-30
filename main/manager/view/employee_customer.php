<?php
$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');

$sql = "SELECT
customer.id,
customer.name,
customer.adress,
customer.number_phone,
customer.email,
(
    SELECT count(*) 
    from bill
    where id_customer = customer.id
    and id_status = 3
) as total_bill,
(
    SELECT sum(total_price) 
    from bill
    where id_customer = customer.id
    and id_status = 3
) as total_price
FROM customer 
group by customer.id
order by total_price desc
limit 100
";
$result = mysqli_query($connect, $sql);
?>

<table border="1" width="100%">
    <tr>
        <th>
            ID
        </th>
        <th>
            Tên khách hàng
        </th>
        <th>
            Địa chỉ
        </th>
        <th>
            Số điện thoại
        </th>
        <th>
            Email
        </th>
        <th>
            Đã mua thành công
        </th>
        <th>
            Đã tiêu
        </th>
    </tr>
    <?php   foreach ($result as $each) : ?>
        <tr>
            <th>
                <?php echo $each['id'] ?>
            </th>
            <th>
                <?php echo $each['name'] ?>
            </th>
            <th>
                <?php echo $each['adress'] ?>
            </th>
            <th>
                <?php echo $each['number_phone'] ?>
            </th>
            <th>
                <?php echo $each['email'] ?>
            </th>
            <th>
                <?php echo $each['total_bill'] ?> đơn
            </th>
            <th>
                <?php echo  number_format(  $each['total_price']  , 0, '', ',') ?> đ
            </th>
        </tr>
    <?php endforeach  ?>

</table>