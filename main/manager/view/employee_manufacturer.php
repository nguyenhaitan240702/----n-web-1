<h1>
    Đây là khu vực nhà sản xuất
</h1>
<?php if($_SESSION['level'] == 2){ ?>
    <a href="?statistical=insert_manufacturer">
        Thêm
    </a>
<?php } ?>

<?php
$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
$sql = "select * from manufacturers";
$result = mysqli_query($connect, $sql);
?>

<table border="1" width="100%">
    <tr>
        <th>Mã</th>
        <th>Tên hãng</th>
        <?php if($_SESSION['level'] == 2){ ?>
            <th>Xóa</th>
        <?php } ?>

    </tr>
    <?php foreach ($result as $each) : ?>
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['name'] ?></td>
            <?php if($_SESSION['level'] == 2){ ?>
                <td>
                    <a href="?statistical=delete_manufacturer&id=<?php echo $each['id'] ?>">
                        Xóa
                    </a>
                </td>
            <?php } ?>
        </tr>
    <?php endforeach  ?>
</table>