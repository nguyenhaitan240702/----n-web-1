
<?php
//include '../menu.php';

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
//  $sql = "select * from manufacturers";

$sql = "select  products.*,
                manufacturers.name as name_manufacturers,
                status_product.name as name_status_product,
                (
                    SELECT
                        IFNULL(SUM(quantity),  0)
                    FROM
                        bill_detail
                    JOIN bill ON bill.id = bill_detail.id_bill
                    WHERE
                        bill_detail.id_product = products.id AND bill.id_status = 3
                ) AS quantity_sales
        from products 
        join manufacturers on manufacturers.id = products.id_manufacture
        join status_product on status_product.id = products.id_status 
        ORDER BY
        quantity_sales
        DESC
        ";
$result = mysqli_query($connect, $sql);

?>
<h1>
    Quản lý sản phẩm
</h1>
<a href="?statistical=insert_product">
    Thêm
</a>
<table border="1" width="100%">
    <tr>
        <th>Mã</th>
        <th>Tên Hãng </th>
        <th>Tên sản phẩm</th>
        <th>Nội dung </th>
        <th>Ảnh </th>
        <th>Giá </th>
        <th>Tình trạng</th>
        <th>Đã bán</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php   foreach ($result as $each) : ?>
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php  echo $each['name_manufacturers'] ?></td>
            <td><?php echo $each['name'] ?>
            </td>
            <td><?php
                echo $each['description']
                ?>
            </td>
            <td>
                <img height ="100" src="images/<?php echo $each['images'] ?>">
            </td>
            <td>
                <?php  echo number_format( $each['price'] , 0, '', ',') ?> đ
            </td>

            <td>
                <?php

                echo $each['name_status_product'] ?>
            </td>
            <td>
                <?php  echo $each['quantity_sales'] ?>
            </td>
            <td>
                <a href="?statistical=update_product&id=<?php echo $each['id'] ?>">
                    Sửa
                </a>
            </td>
            <td>
                <a href="?statistical=delete_product&id=<?php echo $each['id'] ?>">
                    Xóa
                </a>
            </td>
        </tr>
    <?php endforeach  ?>

</table>
