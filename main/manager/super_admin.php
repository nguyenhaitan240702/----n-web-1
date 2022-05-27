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

    <?php include('../../header.php') ?>
   
    <!-- phần bài đăng -->
    <?php
    require '../../connect.php';

    $sql = "select count(*) from bill
            where id_status = '1'
            ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result)['count(*)'];

    ?>
    <?php include('container.php') ?>
        <div class="box_2">
            <div class="category">
                <a href="?">Doanh số</a>
            </div>
            <div class="category">
                <a href="?statistical=5">Đơn cần duyệt</a>
                <button type="button"><?php echo $each ?></button>
            </div>
            <div class="category">
                <a href="?statistical=1">Quản lý nhân viên</a>
            </div>
            <div class="category">
                <a href="?statistical=3">Quản lý sản phẩm</a>
            </div>
            <div class="category">
                <a href="?statistical=2">Quản lý thông tin khách hàng</a>
            </div>
            <div class="category">
                <a href="?statistical=4">Quản lý thông tin nhà sản xuất</a>
            </div>

         </div>
    </div>

    <div class="bill_history">
      <?php
        $statistical = $_GET['statistical'] ?? '';
        switch ($statistical) {
            case '':
                require 'view/turnover.php';
                break;
            case '1':
                require 'view/employee_admin.php';
                break;
            case '2':
                require 'view/employee_customer.php';
                break;
            case '3':
                require 'view/employee_product.php';
                break;
            case '4':
                require 'view/employee_manufacturer.php';
                break;
            case '5':
                require 'view/browser_order.php';
                break;

            case 'insert_product':
                require 'products/form_insert.php';
                break;
            case 'store_product':
                require 'products/process_insert.php';
                break;
            case 'update_product':
                require 'products/form_update.php';
                break;
            case 'delete_product':
                require 'products/delete.php';
                break;
            case 'insert_manufacturer':
                require 'manufacturer/form_insert.php';
                break;
            case 'store_manufacturer':
                require 'manufacturer/process_insert.php';
                break;
            case 'delete_manufacturer':
                require 'manufacturer/delete.php';
                break;
            case 'detail_order':
                require 'order/detail.php';
                break;
            case 'browser_order':
                require 'order/update.php';
                break;
            case 'admin_insert':
                require 'admin/form_insert.php';
                break;
            case 'admin_delete':
                require 'admin/delete.php';
                break;
            default:
                echo 'Unknown';
                break;

        }
      ?>
    </div>
</body>
</html>
    