
<?php

$connect = mysqli_connect('localhost','root','0000','project_web_1',3306);
mysqli_set_charset($connect,'utf8');
//$sql = "select * from manufacturers";
//$sql = "select * from products";
if(empty($_GET['id'])){
    header ('location:index.php?error= Phải điền mã để sửa ');
}
$id = $_GET['id'];
$sql = "select * from products
   where id = '$id' " ;
$result  = mysqli_query($connect , $sql);
$each = mysqli_fetch_array($result);

$sql = "select * from category";
$resultt = mysqli_query($connect, $sql);

$sql = "select * from manufacturers";
$manufacturers = mysqli_query($connect, $sql);
?>

<form action="process_update.php" method="post" enctype="multipart/form-data">
    <br>
    Thêm sản phẩm
    <br>
    <table>

        <input type="hidden" name="id" value="<?php echo $each['id']?>">
        <tr>
            <td>
                Tên
            </td>
            <td>
                <input type="text" name ="name" value="<?php echo $each['name']?>">
            </td>
        </tr>
        <tr>
            <td>
                Nội dung
            </td>
            <td>
                <input type="text" name ="description" value="<?php echo $each['description']?>" >
            </td>
        </tr>
        <tr>
            <td>
                Đổi ảnh mới
            </td>
            <td>
                <input type="file" name="images_new" value="">
            </td>
        <tr>
            <td>
                Hoặc giữ ảnh cũ
            </td>
            <td>
                <img src="images/<?php echo $each['images']?>" height='100'>
                <input type="hidden" name="images_old" value="<?php echo $each['images']?> ">
            </td>
        </tr>

        </tr>
        <tr>
            <td>
                Giá
            </td>
            <td>
                <input type="number" name="price" value=" <?php echo $each['price'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                Hãng sản xuất
            </td>
            <td>
                <select name="id_manufacturers">
                    <?php foreach($manufacturers as $manufacturer):?>
                        <option
                                value ="<?php echo $manufacturer['id'] ?>"
                            <?php if($each['id_manufacture'] ==  $manufacturer['id']){ ?>
                                selected
                            <?php }?>>
                            <?php  echo $manufacturer['name']?>
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
    <button>Sửa</button>

</form>

