<?php session_start();

 if(empty($_SESSION['level'] )){
             header('location:http://localhost/----n-web-1/----n-web-1/index.php');
             exit;
 }

?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
    
    <!-- phần menu -->

    <?php
    require '../../connect.php';

    $sql = "select count(*) from bill
            where id_status = '1'
            ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result)['count(*)'];

    ?>
    <?php include('../../header.php') ?>
   
    <!-- phần bài đăng -->
   
    <?php include('container.php') ?>

    <?php
    if(isset($_GET['profile'])){
        include('profile.php');
    }else{
    ?>
        <div class="box_2">
            <div class="category">
                <a href="?">Đơn cần duyệt</a>
                <button type="button"><?php echo $each ?></button>
            </div>
            <div class="category">
                <a href="?statistical=1">Quản lý sản phẩm</a>
            </div>
            <div class="category">
                <a href="?statistical=2">Xem nhà sản xuất</a>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="bill_history">
        <?php
        $statistical = $_GET['statistical'] ?? '';
        switch ($statistical) {
            case '':
                require 'view/browser_order.php';
                break;
            case 'profile':
                header('location:profile.php');
                break;
            case '1':
                require 'view/employee_product.php';
                break;
            case '2':
                require 'view/employee_manufacturer.php';
                break;
            case 'insert_product':
                require 'products/form_insert.php';
                break;
            case 'store_product':
                require 'products/process_insert.php';
                break;
            case 'product_update':
                require 'products/process_update.php';
                break;
            case 'update_product':
                require 'products/form_update.php';
                break;
            case 'delete_product':
                require 'products/delete.php';
                break;
            case 'detail_order':
                require 'order/detail.php';
                break;
            case 'browser_order':
                require 'order/update.php';
                break;
            default:
                echo 'Error: Unknown';
                break;
        }
        ?>
    </div>
</body>
</html>
    