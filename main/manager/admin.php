<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<?php include('../../head.php') ?>
<body>
    
    <!-- phần menu -->

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
            </div>
            <div class="category">
                <a href="?statistical=1">Quản lý sản phẩm</a>
            </div>

        </div>
    <?php } ?>
    </div>
    <div class="bill_history">

    </div>
</body>
</html>
    