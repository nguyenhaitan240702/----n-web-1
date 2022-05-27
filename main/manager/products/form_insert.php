
<?php

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
 $sql = "select * from manufacturers";
//$sql = "select * from products";
$result = mysqli_query($connect, $sql);

$sql = "select * from category";
$resultt = mysqli_query($connect, $sql);
?>

<form action="?statistical=store_product" method="post" enctype="multipart/form-data">
    <br>
    Thêm sản phẩm
    <br>
    <table>
        <tr>
            <td>
                Tên
            </td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>
                Nội dung
            </td>
            <td>
                <input type="text" name="description">
            </td>
        </tr>
        <tr>
            <td>
                Ảnh
            </td>
            <td>
                <input type="file" name="images">
            </td>
        </tr>
        <tr>
            <td>
                Giá
            </td>
            <td>
                <input type="number" name="price">
            </td>
        </tr>
        <tr>
            <td>
                Hãng sản xuất
            </td>
            <td>
                <select name="id_manufacturers">
                    <?php foreach($result as $each) :  ?>
                        <option value="<?php echo $each['id'] ?> ">
                            <?php echo $each['name']?>
                        </option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Thể loại
            </td>
            <td>
                <select name="id_category">
                    <?php foreach($resultt as $each) :  ?>
                        <option value="<?php echo $each['id'] ?> ">
                            <?php echo $each['name']?>
                        </option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
    </table>
    <br> <br>
    <button>Thêm</button>

</form>
