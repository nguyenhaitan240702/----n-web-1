<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
    
    <!-- phần menu -->

    <?php include('../../header.php') ?>
   
    <!-- phần bài đăng -->
   
    <?php include('container.php') ?>
        <div class="box_2">
            <div class="category">
                <a href="?">Doanh số</a>
            </div>
            <div class="category">
                <a href="?statistical=1">Quản lý nhân viên</a>
            </div>
            <div class="category">
                <a href="?statistical=2">Quản lý thông tin khách hàng</a>
            </div>
            <div class="category">
                <a href="?statistical=3">Quản lý sản phẩm</a>
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
                require 'view_super_admin/turnover.php';
                break;
            case '1':
                require 'view_super_admin/employee_admin.php';
                break;
            case '2':
                require 'view_super_admin/employee_customer.php';
                break;
            case '3':
                require 'view_super_admin/employee_product.php';
                break;
            case '4':
                require 'view_super_admin/employee_manufacturer.php';
                break;

        }
      ?>
    </div>
</body>
</html>
    